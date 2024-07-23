<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;

    protected $table = 'recipients';
    protected $primaryKey = 'id';
    protected $fillable = [
        'notification_id',
        'user_id',
        'status',
        'read_at',
    ];

    public function notification()
    {
        return $this->belongsTo(Notification::class, 'notification_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function markAsRead()
    {
        $this->status = 'read';
        $this->read_at = now();
        $this->save();
    }

    public function markAsUnread()
    {
        $this->status = 'unread';
        $this->read_at = null;
        $this->save();
    }

    public function isRead()
    {
        return $this->status === 'read';
    }

    public function isUnread()
    {
        return $this->status === 'unread';
    }

    public function isReadByUser($user)
    {
        return $this->isRead() && $this->user_id === $user->id;
    }

    public function isUnreadByUser($user)
    {
        return $this->isUnread() && $this->user_id === $user->id;
    }

    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }

    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }
}
