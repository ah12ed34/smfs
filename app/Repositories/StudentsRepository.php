<?php

namespace App\Repositories;

use App\Contracts\StudentsInterface;
use App\Models\Group;
use App\Models\Student;
use App\Models\GroupStudent;
use App\Models\GroupSubject;
use App\Models\Level;
use App\Models\Subject;
use App\Models\AcademicYear;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StudentsRepository extends AcademicYRepository implements StudentsInterface
{


    /**
     * get students in group
     * @param Group $group
     * @return BelongsToMany
     * @return Collection
     * @return Builder
     * @return mixed
     * @return Student
     * @return Student[]
     * @return Student[]
     *
     * @return GroupStudent
     */
	public function getStudentsInGroup(Group $group)
	{
        $students = $group->students()
            ->where('ay_id',$this->currentAcademicYear->id);
        return $students;
	}

    /**
     * get students not in group
     * @param Group $group
     * @return mixed
     * @return Student
     * @return Student[]
     * @return Student[]
     * @return Collection
     * @return Builder
     * @return BelongsToMany
     * @return GroupStudent
     */
	public function getStudentsNotInGroup(Group $group)
	{
        $students = Student::where('level_id',$group->level_id)->whereDoesntHave('groups',function($q)use($group){
            if($group->group_id){
                $q->where('group_students.group_id','!=',$group->group_id)
                    ->where('group_students.ay_id',$this->currentAcademicYear->id);
            }else{
                $q->whereNull('groups.group_id')
                ->where('group_students.ay_id',$this->currentAcademicYear->id);
            }
        });
        return $students;
	}

    /**
     * get students in group if group id is set, otherwise get students not in group
     * @param Group $group
     * @return Collection
     */
    public function getStudentsInOrNotInGroup(Group $group)
    {
        if($group->group_id){
            return   $this->getStudentsInGroup(Group::find($group->group_id));
        }else{
            return   $this->getStudentsNotInGroup($group);
        }
    }
    /**
     * add student to group if the group is not full
     * @param Student $student
     * @param Group $group
     * @return int 101 if student already in group, 102 if group is full, 103 if group system not match student system , 104 if group not match student gender
     * @return true if student added successfully , false if error occurred
     */
	public function addStudentToGroup(Student $student, Group $group,bool $force=false)
	{
        if($group->students()->where('student_id',$student->user_id)->where('group_students.ay_id',$this->currentAcademicYear->id)->exists()){
            return 101;
        }
        if(!$force&&$group->students()->where('group_students.ay_id',$this->currentAcademicYear->id)
            ->count() >= $group->max_students){
            return 102;
        }
        if(!$force&&$group->system&&!in_array($group->system,['all',$student->system])){
            return 103;
        }
        if(!$force&&$group->gender&&!in_array($group->gender,['all',$student->user->gender])){
            return 104;
        }
        return DB::Table('group_students')->insert([
            'student_id'=>$student->user_id,
            'group_id'=>$group->id,
            'ay_id'=>$this->currentAcademicYear->id,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
	}

    public function addStudentsInGroup(Group $group, array $students)
    {
        $errors = [];
        foreach($students as $student){
            $result = $this->addStudentToGroup(Student::find($student), $group);
            if($result !== true){
                $errors[] = $result;
            }

        }
        return !empty($errors) ? $errors : true;

    }
    /**
     * remove student from group
     * @param Student $student
     * @param Group $group
     * @return int
     */
	public function removeStudentFromGroup(Student $student, Group $group)
	{
        return $group->students()->detach($student->id,['ay_id'=>$this->currentAcademicYear->id]);
	}

    /**
     * get student groups
     * @param Student $student
     * @return BelongsToMany
     * @return Collection
     * @return Builder
     * @return mixed
     * @return Group
     * @return Group[]
     */
	public function getStudentGroups(Student $student)
	{
		$students = Student::where('user_id',$student->user_id)->firstOrFail()->groups()
            ->where('ay_id',$this->currentAcademicYear->id);
        return $students;
	}

    /**
     * get student groups by subject
     * @param Student $student
     * @param $subject
     * @return BelongsToMany
     * @return Collection
     * @return Builder
     * @return mixed
     * @return Group
     * @return Group[]
     */
	public function getStudentGroupsBySubject(Student $student, $subject)
	{
		return $student->groups()->whereHas('subjects',function($q) use($subject){
            $q->where('subject_id',$subject);
        })->where('group_students.ay_id',$this->currentAcademicYear->id);
	}

	public function getStudentGroupsByLevel(Student $student, $level)
	{
		// implementation goes here
	}

	public function getStudentGroupsBySubjectAndLevel(Student $student, $subject, $level)
	{
		// implementation goes here
	}

	public function getStudentGroupsBySubjectAndLevelAndGroup(Student $student, $subject, $level, Group $group)
	{
		// implementation goes here
	}

	public function getStudentGroupsBySubjectAndGroup(Student $student, $subject, Group $group)
	{
		// implementation goes here
	}

	public function getStudentGroupsByLevelAndGroup(Student $student, $level, Group $group)
	{

	}

	public function getStudentGroupsByGroup(Student $student, Group $group)
	{
		return $student->groups()->where('group_students.group_id',$group->id)
            ->where('group_students.ay_id',$this->currentAcademicYear->id);
	}

    public function getLevelsStudent(Student $student)
    {
        $levels = [];
        foreach($student->groups->whereNull('group_id') as $group){
            foreach($group->groupStudents->where('student_id',$student->user_id) as $gs){
                if($gs->ay_id != $this->currentAcademicYear->id){
                    for($i = 0; $i < $group->level->subjectLevels()->max('semester'); $i++){
                        $trems[] = $i+1;
                    }
                    $levels[] = ['gs'=> $gs,'level' =>  $group->level , 'term' => $trems];
                }else{
                    $trems = [];
                    for($i = 0; $i < $this->currentAcademicYear->term; $i++){
                        $trems[] = $i+1;
                    }
                    $levels[] = ['gs'=> $gs,'level' =>  $group->level , 'term' => $trems];
                }
            }
        }
        return $levels;
    }

    // public function getLevelsAndTermsStudent(Student $student)
    // {
    //     $levels = $this->getLevelsStudent($student);
    //     $levelsAndTerms = [];
    //     foreach($levels as $level){
    //         $levelsAndTerms[] =
    //     }

    // }

    public function moveStudentToGroup(Student $student, Group $group, Group $oldGroup, bool $force = false)
    {
        if ($force||$this->checkedSysAndGender($student,$group)){
            if($oldGroup->IsPractical()){
                if($oldGroup->students()->where('student_id',$student->user_id)->where('group_students.ay_id',$this->currentAcademicYear->id)->exists()){
                    $oldGroup->students()->where('student_id',$student->user_id)->update(['group_id'=>$group->id,'updated_at'=>now()]);
                }else{
                    // الطالب ليس في المجموعة
                    return 102;
                }
            }else{
                // $gs علاقة الطالب بالمجموعة العملي القدية
                $gs = DB::table('group_students')->where('student_id',$student->user_id)
                    ->where('ay_id',$this->currentAcademicYear->id)
                    ->whereIn('group_id',Group::where('group_id',$oldGroup->id)->pluck('id')->toArray())
                    ->get();
                // $temp_sub مجموعات العملي لمجموعة النظري الجديدة
                $temp_sub = Group::where('group_id',$group->id)->get();
                if($gs->count() == 0){
                    DB::table('group_students')->where('student_id',$student->user_id)
                        ->where('ay_id',$this->currentAcademicYear->id)
                        ->where('group_id',$oldGroup->id)->update(['group_id'=>$group->id,'updated_at'=>now()]);
                    return 200;
                }elseif($temp_sub->count() == 0){
                    // لا يوجد مجموعات عملي للانضمام لها
                    return 105;
                }
                for($i = 0; $i < $gs->count(); $i++){
                    for($j = 0; $j < $temp_sub->count(); $j++){
                        if($force||$this->checkedSysAndGender($student,$temp_sub[$j])){
                            // تحديث علاقة الطالب بالمجموعة العملي الجديدة
                            DB::table('group_students')->where('id',$gs[$i]->id)
                                ->where('ay_id',$this->currentAcademicYear->id)
                                ->update(['group_id'=>$temp_sub[$j]->id,'updated_at'=>now()]);
                            if($i == $gs->count()-1){
                                // تحديث علاقة الطالب بالمجموعة النظري الجديدة
                                DB::table('group_students')->where('student_id',$student->user_id)
                                    ->where('ay_id',$this->currentAcademicYear->id)
                                    ->where('group_id',$oldGroup->id)
                                    ->update(['group_id'=>$group->id,'updated_at'=>now()]);
                                    return 200;
                            }
                            break;
                        }elseif($j == $temp_sub->count()-1){
                            // لا يستوفي الطالب الشروط للانضمام للمجموعة العملي
                            return 106;
                        }

                    }
                }
            }
        }else{
            // لا يستوفي الطالب الشروط للانضمام للمجموعة
            return 107;
        }

    }

    public function checkedSysAndGender(Student $student, Group $group)
    {
        return $group->students()->count() < $group->max_students &&
            in_array($group->system,[$student->system,'all',null]) &&
            in_array($group->gender,[$student->user->gender,'all',null]);
    }
}
