<?php

namespace App\Traits;

use App\Models\Level;
use App\Models\AcademicYear;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Repositories\EmployeesRepository;
use App\Models\Department;

trait ToolsNav
{
    use Tools;
    protected $EmployeesR;

    public $active = [
        'group' => null,
        'term' => null,
        'subject' => null,
        'teacher' => null,
        'type' => null,
        'department' => null,
        'level' => null,
        'role' => null,
    ];
    public $groups;
    public $subjects;
    public $terms;
    public $teachers;
    public $types;
    public $levels;
    public $roles;
    public $departments;

    protected $request;
    /**
     * Initialize tools and set active selections for navigation.
     *
     * @param Level|null $level Level model.
     * @param array $selectActive 'group'||'term'||'subject'||'teacher' or 'all' to select all if group can be ['all','practical','theory']  if practical
     * @return void
     */
    public function initializeToolsNav(Level $level = null, array $selectActive = [], bool $isRequest = true)
    {
        if (empty($selectActive)) {
            return;
        } else {
            if ($isRequest)
                $this->request = request();
            else
                $this->request = new Request();
        }

        if (in_array('all', $selectActive)) {
            $selectActive = ['group', 'term', 'subject', 'teacher', 'type', 'department', 'level', 'role'];
        }


        if (in_array('term', $selectActive)) {
            $this->initializeTerms($level ?? Level::first());
        }

        if (in_array('subject', $selectActive)) {
            $this->initializeSubjects($level);
        }
        if (in_array('teacher', $selectActive)) {
            $this->initializeTeacher($level);
        }

        if (in_array('type', $selectActive)) {
            $this->initializeType();
        }
        if (in_array('department', $selectActive)) {
            $this->initializeDepartments();
        }
        if (in_array('level', $selectActive)) {
            $this->initializeLevels();
        }
        if (in_array('role', $selectActive)) {
            $this->initializeRoles();
        }

        if (in_array('group', $selectActive)) {
            if (isset($selectActive['group']) && is_array($selectActive['group'])) {
                $this->initializeGroups($level, $selectActive['group'][0] ?? 'all', isset($selectActive['group'][1]) ? $selectActive['group'][1] : null);
            } else {
                $this->initializeGroups($level);
            }
        }
    }

    public function getruquest()
    {
        return $this->request;
    }

    public function initializeToolsNavSub()
    {
        $this->request = new Request();
    }

    public function initializeRoles()
    {
        if ($this->request->has('role') && is_numeric($this->request->role)) {
            $this->active['role'] = $this->request->role;
        } else {
            $this->active['role'] = null;
        }

        $this->roles = Role::all();
    }

    public function initializeLevels()
    {
        if ($this->request->has('level') && is_numeric($this->request->level)) {
            $this->active['level'] = $this->request->level;
        } else {
            $this->active['level'] = null;
        }
        $department_id = $this->active['department'] ?? null;

        $this->levels = Level::when($department_id, function ($query) use ($department_id) {
            return $query->where('department_id', $department_id);
        })->get();
    }

    public function initializeDepartments()
    {
        if ($this->request->has('department') && is_numeric($this->request->department)) {
            $this->active['department'] = $this->request->department;
        } else {
            $this->active['department'] = null;
        }
        if ($this?->departments?->count() == 0)
            $this->departments = Department::all();
    }

    /**
     * Initialize type.
     *
     * @param Request $this->request
     */
    public function initializeType()
    {
        if ($this->request->has('type')) {
            $this->active['type'] = $this->request->type;
        } else {
            $this->active['type'] = null;
        }
        $this->types = collect([
            (object)['id' => null, 'name' => 'الكل'],
            (object)['id' => 'practical', 'name' => 'العملي'],
            (object)['id' => 'theory', 'name' => 'النظري'],
        ]);
    }

    /**
     * Initialize groups.
     *
     * @param Request $this->request
     * @param Level|null $level
     * @param string $type نظري او عملي او الكل
     */
    private function initializeGroups(Level $level = null, $type = 'all', $group_id = null)
    {
        if ($this->request->has('group') && is_numeric($this->request->group)) {
            $this->active['group'] = $this->request->group;
        } else {
            $this->active['group'] = null;
        }
        // if (!$this->groups) {
        if ($this->departments?->count() > 0) {
            $department_id = $this->active['department'] ?? null;
            $level_id = $this->active['level'] ?? null;
            $this->groups = $this->getGroupsByDepartment($department_id, $level_id, $type, $group_id);
        } elseif ($this?->levels?->count() > 0) {
            $level_id = $this->active['level'] ?? null;
            $this->groups = $this->getGroupsByLevel($level_id, $type);
        } elseif ($level) {
            $this->levels = $level;
            $this->groups = $this->getGroupsByLevel($level->id, $type);
        } else {
            $this->groups = collect();
        }
        // }
    }
    public function getGroupsByLevel($level_id, $type = 'all', $group_id = null)
    {
        // if (!$this->groups) {
        //     if ($type == 'all') {
        //         $this->groups = $level ? $level->groups : collect();
        //     } elseif ($type == 'practical') {
        //         $this->groups = $level ? $level->groups->whereNotNull('group_id')
        //             ->when($group_id, function ($query) use ($group_id) {
        //                 return $query->where('group_id', $group_id);
        //             }) : collect();
        //     } elseif ($type == 'theory') {
        //         $this->groups = $level ? $level->groups->whereNull('group_id') : collect();
        //     }
        // }

        // return $this->groups;
        return $this->levels->when($level_id, function ($query) use ($level_id) {
            return $query->where('id', $level_id);
        })->get()->map(function ($level) use ($type, $group_id) {
            return $level->groups->when($type == 'all', function ($query) {
                return $query;
            })->when($type == 'practical', function ($query) {
                return $query->whereNotNull('group_id');
            })->when($type == 'theory', function ($query) {
                return $query->whereNull('group_id');
            })->when($group_id, function ($query) use ($group_id) {
                return $query->where('group_id', $group_id);
            });
        })->flatten();
    }

    public function getGroupsByDepartment($department_id, $level_id, $type = 'all', $group_id = null)
    {
        $groups = Department::when($department_id, function ($query) use ($department_id) {
            $query->where('id', $department_id);
        })->get()->map(function ($department) use ($level_id, $type, $group_id) {
            return $department->levels->when($level_id, function ($query) use ($level_id) {
                return $query->where('id', $level_id);
            })->map(function ($level) use ($type, $group_id) {
                return $level->groups->when($type == 'all', function ($query) {
                    return $query;
                })->when($type == 'practical', function ($query) {
                    return $query->whereNotNull('group_id');
                })->when($type == 'theory', function ($query) {
                    return $query->whereNull('group_id');
                })->when($group_id, function ($query) use ($group_id) {
                    return $query->where('group_id', $group_id);
                });
            });
        })->flatten();
        return $groups;
    }
    /**
     * Initialize terms.
     *
     * @param Request $this->request
     * @param Level|null $level
     */
    private function initializeTerms(Level $level)
    {
        if ($this->request->has('term') && is_numeric($this->request->term)) {
            $this->active['term'] = $this->request->term;
        } else {
            $this->active['term'] = AcademicYear::getTerm();
        }

        $this->terms = $level ? $this->getTermsByLevel($level) : collect();
    }

    /**
     * Initialize subjects.
     *
     * @param Request $this->request
     * @param Level|null $level
     */
    private function initializeSubjects(Level $level = null)
    {
        if ($this->request->has('subject') && is_numeric($this->request->subject)) {
            $this->active['subject'] = $this->request->subject;
        } else {
            $this->active['subject'] = null;
        }
        $term = $this->active['term']  ?? 1;
        $level_id = $level ? $level->id : (isset($this->active['level']) ? $this->active['level'] : null);
        if (!$this->levels) {
            $this->levels = Level::all();
        }
        $this->subjects = $this?->levels?->when($level, function ($query) use ($level_id) {
            return $query->where('id', $level_id);
        })->map(function ($level) use ($term) {
            return $level->subjectLevels->where('semester', $term)->map(function ($subjectLevel) {
                return $subjectLevel->subject;
            });
        })->flatten();

        if ($this->request->has('subject') && is_numeric($this->request->subject)) {
            $subjectId = $this->request->subject;
            if ($this->subjects->where('pivot.id', $subjectId)->count() > 0) {
                $this->active['subject'] = $subjectId;
            }
        }
    }

    private function initializeTeacher(Level $level)
    {
        if ($this->request->has('teacher') && is_numeric($this->request->teacher)) {
            $this->active['teacher'] = $this->request->teacher;
        } else {
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
    public function setDepartment($department_id = null)
    {
        $this->setActive('department', $department_id);
        $this->initializeLevels();
        $this->initializeGroups();
    }

    public function setLevel($level_id = null)
    {
        $this->setActive('level', $level_id);
        $this->initializeGroups();
    }

    public function setRole($role_id = null)
    {
        $this->setActive('role', $role_id);
    }

    public function setSubject($subject_id = null)
    {
        $this->setActive('subject', $subject_id);
    }

    public function setGroup($group_id = null)
    {
        $this->setActive('group', $group_id);
    }

    public function setActive($key, $value)
    {
        $this->initializeToolsNavSub();

        if (
            $key && $value && array_key_exists($key, $this->active) && $this->active[$key] != $value
        ) {
            $this->active[$key] = is_numeric($value) ? (int)$value : null;
        } elseif (
            $key && !$value && array_key_exists($key, $this->active)
        ) {
            $this->active[$key] = null;
        }
    }
}
