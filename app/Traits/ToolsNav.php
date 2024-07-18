<?php

namespace App\Traits;

use App\Models\Level;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Repositories\EmployeesRepository;

trait ToolsNav
{
    use Tools;
    Protected $EmployeesR;

    public $active = [];
    public $groups;
    public $subjects;
    public $terms;
    public $teachers;


    /**
     * Initialize tools and set active selections for navigation.
     *
     * @param Level|null $level Level model.
     * @param array $selectActive 'group'||'term'||'subject'||'teacher' or 'all' to select all if group can be ['all','practical','theory']  if practical
     * @return void
     */
    public function initializeToolsNav(Level $level = null, array $selectActive = [])
    {
        if(empty($selectActive)) {
            return;
        }else{
            $request = request();
        }

        if(in_array('all', $selectActive)){
            $selectActive = ['group', 'term', 'subject','teacher'];
        }
        if (in_array('group', $selectActive)) {
            if(isset($selectActive['group'])&&is_array($selectActive['group'])){
                $this->initializeGroups($request, $level,$selectActive['group'][0]??'all',isset($selectActive['group'][1])?$selectActive['group'][1]:null);
            }else{
                $this->initializeGroups($request, $level);
            }
        }

        if (in_array('term', $selectActive)) {
            $this->initializeTerms($request, $level);
        }

        if (in_array('subject', $selectActive)) {
            $this->initializeSubjects($request, $level);
        }
        if(in_array('teacher', $selectActive)){
            $this->initializeTeacher($request, $level);
        }
    }

    /**
     * Initialize groups.
     *
     * @param Request $request
     * @param Level|null $level
     * @param string $type نظري او عملي او الكل
     */
    private function initializeGroups(Request $request, Level $level, $type = 'all', $group_id = null)
    {
        if ($request->has('group') && is_numeric($request->group)) {
            $this->active['group'] = $request->group;
        }else{
            $this->active['group'] = null;
        }
        if(!$this->groups){
             if($type == 'all'){
            $this->groups = $level ? $level->groups : collect();
            }elseif($type == 'practical'){
                $this->groups = $level ? $level->groups->whereNotNull('group_id')
                ->when($group_id, function($query) use ($group_id){
                    return $query->where('group_id', $group_id);
                }) : collect();
            }elseif($type == 'theory'){
                $this->groups = $level ? $level->groups->whereNull('group_id'): collect();
            }
        }


    }

    /**
     * Initialize terms.
     *
     * @param Request $request
     * @param Level|null $level
     */
    private function initializeTerms(Request $request, Level $level)
    {
        if ($request->has('term') && is_numeric($request->term)) {
            $this->active['term'] = $request->term;
        } else {
            $this->active['term'] = AcademicYear::getTerm();
        }

        $this->terms = $level ? $this->getTermsByLevel($level) : collect();
    }

    /**
     * Initialize subjects.
     *
     * @param Request $request
     * @param Level|null $level
     */
    private function initializeSubjects(Request $request, Level $level)
    {
        if ($request->has('subject') && is_numeric($request->subject)) {
            $this->active['subject'] = $request->subject;
        } else {
            $this->active['subject'] = null;
        }
        $term = $this->active['term'] ?? 1;
        $this->subjects = $level
            ? $level->subjects->where('pivot.semester', $term)->where('pivot.isActivated', 1)
            : collect();

        if ($request->has('subject') && is_numeric($request->subject)) {
            $subjectId = $request->subject;
            if ($this->subjects->where('pivot.id', $subjectId)->count() > 0) {
                $this->active['subject'] = $subjectId;
            }
        }
    }

    private function initializeTeacher(Request $request, Level $level){
        if($request->has('teacher') && is_numeric($request->teacher)){
            $this->active['teacher'] = $request->teacher;
        }else{
            $this->active['teacher'] = null;
        }

        $this->EmployeesR = new EmployeesRepository();
        $this->teachers = $level ? $this->EmployeesR?->getAcademicsByLevel($this->level->id)->get() : collect();

    }

    /**
     * Get terms by level.
     *
     * @param Level $level
     * @return \Illuminate\Support\Collection
     */
    public function getTermsByLevel(Level $level)
    {
        $maxSemester = $level->subjectLevels()->max('semester');
        $terms = collect();

        for ($i = 1; $i <= $maxSemester; $i++) {
            $terms->push((object)[
                'id' => $i,
                'name' => 'الترم ' . $this->numberToOrdinal($i)
            ]);
        }

        return $terms;
    }
}
