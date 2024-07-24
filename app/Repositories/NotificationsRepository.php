<?php

namespace App\Repositories;

use App\Livewire\Admin\Academic;
use App\Models\Notification;
use App\Models\Recipient;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class NotificationsRepository extends AcademicYRepository
{
    public function markAsReadByUser(Notification $notification, User $user)
    {
        $recipient = $notification->recipients()->where('user_id', $user->id)->first();
        if ($recipient) {
            $recipient->markAsRead();
        }
    }

    public function markAsUnreadByUser(Notification $notification, User $user)
    {
        $recipient = $notification->recipients()->where('user_id', $user->id)->first();
        if ($recipient) {
            $recipient->markAsUnread();
        }
    }

    public function isReadByUser(Notification $notification, User $user)
    {
        $recipient = $notification->recipients()->where('user_id', $user->id)->first();
        return $recipient && $recipient->isRead();
    }

    public function isUnreadByUser(Notification $notification, User $user)
    {
        $recipient = $notification->recipients()->where('user_id', $user->id)->first();
        return $recipient && $recipient->isUnread();
    }

    public function scopeUnread($query)
    {
        return $query->whereDoesntHave('recipients', function ($query) {
            $query->where('status', 'read');
        });
    }

    public function scopeRead($query)
    {
        return $query->whereHas('recipients', function ($query) {
            $query->where('status', 'read');
        });
    }

    public function scopeForUser($query, $user)
    {
        return $query->whereHas('recipients', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });
    }

    public function getNotificationsForUser(User $user)
    {
        return Notification::forUser($user)->get();
    }

    public function getUnreadNotificationsForUser(User $user)
    {
        return Notification::forUser($user)->unread()->get();
    }

    public function getReadNotificationsForUser(User $user)
    {
        return Notification::forUser($user)->read()->get();
    }

    public function getUnreadNotificationsCountForUser(User $user)
    {
        return Notification::forUser($user)->unread()->count();
    }

    public function getReadNotificationsCountForUser(User $user)
    {
        return Notification::forUser($user)->read()->count();
    }

    function getUsersByRole($role_id = null, $notRole = ['admin'])
    {
        return User::whereHas('roles', function ($query) use ($role_id, $notRole) {
            $query->when($role_id, function ($query) use ($role_id) {
                $query->where('role_id', $role_id);
            }, function ($query) use ($notRole) {
                $query->whereIn('role_id', Role::All()->whereNotIn('name', $notRole)->pluck('id')->toArray());
            });
        })->get()->pluck('id')->toArray();
    }

    public function getUsersIsTeacherByDepartment($department_id = null)
    {
        return User::whereHas('academic', function ($query) use ($department_id) {
            $query->when($department_id, function ($query) use ($department_id) {
                $query->where('department_id', $department_id);
            })
                ->whereNotNull('department_id')
                ->whereNotNull('academic_name');
        })->get()->pluck('id')->toArray();
    }

    public function getUsersByDepartmentOrRole($department_id = null, $role_id = null)
    {
        return User::whereHas('academic', function ($query) use ($department_id) {
            $query->when($department_id, function ($query) use ($department_id) {
                $query->where('department_id', $department_id);
            })
                ->whereNotNull('department_id')
                ->whereNotNull('academic_name');
        })->orWhereHas('roles', function ($query) use ($role_id) {
            $query->when($role_id, function ($query) use ($role_id) {
                $query->where('role_id', $role_id);
            }, function ($query) {
                $query->whereIn('role_id', Role::All()->where('name', '!=', 'admin')->pluck('id')->toArray());
            });
        })->get()->pluck('id')->toArray();
    }

    public function getUsersByDepartmentAndRole($department_id = null, $role_id = null)
    {
        return User::whereHas('academic', function ($query) use ($department_id) {
            $query->when($department_id, function ($query) use ($department_id) {
                $query->where('department_id', $department_id);
            })
                ->whereNotNull('department_id')
                ->whereNotNull('academic_name');
        })->whereHas('roles', function ($query) use ($role_id) {
            $query->when($role_id, function ($query) use ($role_id) {
                $query->where('role_id', $role_id);
            }, function ($query) {
                $query->whereIn('role_id', Role::All()->where('name', '!=', 'admin')->pluck('id')->toArray());
            });
        })->get()->pluck('id')->toArray();
    }

    public function getUsersIsHeadOfDepartmentByDepartment($department_id = null)
    {
        return $this->getUsersByDepartmentAndRole($department_id, Role::where('name', 'HeadOfDepartment')->first()->id);
    }

    public function getUsersByAcademic($academic_id = null)
    {
        return User::whereHas('academic', function ($query) use ($academic_id) {
            $query->when($academic_id, function ($query) use ($academic_id) {
                $query->where('user_id', $academic_id);
            });
        })->get()->pluck('id')->toArray();
    }

    public function getUsersIsStudentByDepartmentAndLevelAndGroup($department_id = null, $level_id = null, $group_id = null)
    {
        return DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->join('group_students', 'students.user_id', '=', 'group_students.student_id')
            ->join('groups', 'group_students.group_id', '=', 'groups.id')
            ->join('levels', function ($join) {
                $join->on('groups.level_id', '=', 'levels.id')
                    ->on('students.level_id', '=', 'levels.id');
            })
            ->where('group_students.ay_id', $this->currentAcademicYear->id)
            ->when($group_id, function ($query) use ($group_id) {
                $query->where('group_students.group_id', $group_id);
            }, function ($query) {
                $query->whereNotNull('group_students.group_id');
            })
            ->when($department_id, function ($query) use ($department_id) {
                $query->where('students.department_id', $department_id);
            }, function ($query) {
                $query->whereNotNull('students.department_id');
            })->when($level_id, function ($query) use ($level_id) {
                $query->where('levels.id', $level_id);
            }, function ($query) {
                $query->whereNotNull('students.level_id');
            })
            ->select('users.id')
            ->distinct()
            ->get()
            ->pluck('id')
            ->toArray();
    }

    public function getUsersByDepartmentAndGroupAndSubject($department_id = null, $group_id = null, $subject_id = null)
    {
        $subject = DB::table('group_subjects')->where('id', $subject_id)->first();
        return DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->join('group_students', 'students.user_id', '=', 'group_students.student_id')
            ->join('groups', 'group_students.group_id', '=', 'groups.id')
            ->when($group_id, function ($query) use ($group_id) {
                $query->where('groups.id', $group_id);
            }, function ($query) {
                $query->whereNotNull('groups.id');
            })
            ->when($subject_id, function ($query) use ($subject_id, $subject) {
                $query->join('group_subjects', function ($join) use ($subject_id, $subject) {
                    $join->on('group_students.group_id', '=', 'group_subjects.group_id')
                        ->where('group_subjects.ay_id', $this->currentAcademicYear->id)
                        ->where('group_subjects.subject_id', $subject->subject_id)
                        ->where('group_subjects.teacher_id', $subject->teacher_id);;
                });
            })
            ->when($department_id, function ($query) use ($department_id) {
                $query->where('students.department_id', $department_id);
            }, function ($query) {
                $query->whereNotNull('students.department_id');
            })
            ->select('users.id')
            ->distinct()
            ->get()
            ->pluck('id')
            ->toArray();
    }

    public function senedNotification($data)
    {
        $notification = Notification::create($data);
        $users = $data['users'];
        $users = is_array($users) ? $users : [$users];
        $users = array_unique($users);
        $users = array_filter($users);
        $users = array_values($users);
        $users = User::whereIn('id', $users)
            ->whereNot('id', $data['sender_id'])->get();
        $users->each(function ($user) use ($notification) {
            Recipient::create([
                'notification_id' => $notification->id,
                'user_id' => $user->id,
            ]);
        });
        return $notification;
    }
}
