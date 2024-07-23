<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'message',
        'sender_id',
        'subject_id',
        'ay_id',
        'sender_type',
        'target',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function subject()
    {
        return $this->belongsTo(GroupSubject::class, 'subject_id')
            ->where('group_subjects.ay_id', $this->ay_id);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'ay_id');
    }

    public function recipients()
    {
        return $this->hasMany(Recipient::class, 'notification_id');
    }

    public function markAsReadByUser($user)
    {
        $recipient = $this->recipients()->where('user_id', $user->id)->first();
        if ($recipient) {
            $recipient->markAsRead();
        }
    }

    public function markAsUnreadByUser($user)
    {
        $recipient = $this->recipients()->where('user_id', $user->id)->first();
        if ($recipient) {
            $recipient->markAsUnread();
        }
    }

    public function isReadByUser($user)
    {
        $recipient = $this->recipients()->where('user_id', $user->id)->first();
        return $recipient && $recipient->isRead();
    }

    public function isUnreadByUser($user)
    {
        $recipient = $this->recipients()->where('user_id', $user->id)->first();
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

    public function scopeForGroup($query, $group)
    {
        return $query->where('target', 'group')
            ->where('subject_id', $group->id);
    }

    public function scopeForUserAndGroup($query, $user, $group)
    {
        return $query->where('target', 'group')
            ->where('subject_id', $group->id)
            ->whereHas('recipients', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
    }

    public function scopeForUserAndAcademicYear($query, $user, $ay)
    {
        return $query->where('ay_id', $ay->id)
            ->whereHas('recipients', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
    }

    
}
