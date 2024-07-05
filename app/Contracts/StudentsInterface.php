<?php

namespace App\Contracts;
use App\Models\Group;
use App\Models\Student;
use App\Models\Level;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface StudentsInterface
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
    public function getStudentsInGroup(Group $group);
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
    public function getStudentsNotInGroup(Group $group);

    /**
     * get students in group if group id is set, otherwise get students not in group
     * @param Group $group
     * @return Collection
     */
    public function getStudentsInOrNotInGroup(Group $group);
    /**
     * add student to group if the group is not full
     * @param Student $student
     * @param Group $group
     * @return int 101 if student already in group, 102 if group is full, 103 if group system not match student system , 104 if group not match student gender
     * 200 if student added successfully, 500 if error occurred
     */
    public function addStudentToGroup(Student $student_id, Group $group_id);

    /**
     * add students to group if the group is not full
     * @param Group $group
     * @param Array $students
     * @return int 102 if student not in group, 105 if no practical groups to join, 106 If the student does not match the practical groups, 107 if student not match group
     */
    public function addStudentsInGroup(Group $group,Array $students);
        /**
     * remove student from group
     * @param Student $student
     * @param Group $group
     * @return int
     */
    public function removeStudentFromGroup(Student $student_id, Group $group_id);
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
    public function getStudentGroups(Student $student_id);

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
    public function getStudentGroupsBySubject(Student $student_id, $subject);
    public function getStudentGroupsByLevel(Student $student_id, $level);
    public function getStudentGroupsBySubjectAndLevel(Student $student_id, $subject, $level);
    public function getStudentGroupsBySubjectAndLevelAndGroup(Student $student_id, $subject, $level, Group $group_id);
    public function getStudentGroupsBySubjectAndGroup(Student $student_id, $subject, Group $group_id);

    public function getAYear();
    public function setAYear($id);

        /**
     * move student to group if the group is not full and the student is allowed to join the group and the student is not already in the group and the student is not in the group of the same level and the student is not in the group of the same system
     * @param Student $student
     * @param Group $group
     * @param Group $oldGroup
     * @param bool $force
     * @return int 102 if student not in group, 105 if no practical groups to join, 106 If the student does not match the practical groups, 107 if student not match group
     */
    function moveStudentToGroup(Student $student, Group $newGroup, Group $oldGroup,bool $force=false);

}
