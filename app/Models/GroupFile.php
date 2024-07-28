<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupFile extends Model
{
    use HasFactory;

    protected $table = 'group_files';
    protected $primaryKey = 'id';
    protected $fillable = [
        'group_subject_id',
        'file_id',
        'user_id',
        'is_active',
        'grade',
        'due_date',
    ];

    // // create create group file
    // public static function create(array $data)
    // {
    //     $file = null;
    //     try{
    //         $file = File::create($data);
    //         $groupFile = new GroupFile();
    //         $groupFile->group_subject_id = $data['group_subject_id'];
    //         $groupFile->file_id = $file->id;
    //         $groupFile->user_id = $data['user_id'];
    //         $groupFile->save();
    //         return $groupFile;
    //     }catch(\Exception $e){
    //         if($file){
    //             $file->delete();
    //         }
    //         throw $e;
    //     }

    // }
    // public static function add_file($data)
    // {
    //     $file = null;
    //     try{
    //         $file = File::find($data['file_id']);
    //         $groupFile = new GroupFile();
    //         $groupFile->group_subject_id = $data['group_subject_id'];
    //         $groupFile->file_id = $file->id;
    //         $groupFile->user_id = $data['user_id'];
    //         $groupFile->save();
    //         return $groupFile;
    //     }catch(\Exception $e){
    //         throw $e;
    //     }
    // }
    public function group_subject()
    {
        return $this->belongsTo(GroupSubject::class, 'group_subject_id');
    }

    public function file()
    {
        return $this->hasOne(File::class, 'id', 'file_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function group_subjects()
    {
        return $this->hasMany(GroupSubject::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class, 'file_id', 'id');
    }
    public function deliverys()
    {
        return $this->hasMany(Delivery::class, 'file_id', 'id');
    }


    public function group_subjectJoin()
    {
        return GroupSubject::join('group_files', 'group_subjects.id', '=', 'group_files.group_subject_id')
            ->where('group_files.file_id', $this->file_id)
            ->select('group_subjects.*')
            ->first();
    }

    protected static $deleting = false;
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($groupFile) {
            if (self::$deleting) {
                return;
            }

            self::$deleting = true;
            // dd($groupFile->file->group_files->count());
            if (1 == $groupFile?->file?->group_files?->count()) {
                $groupFile->file->delete();
            }

            self::$deleting = false;
        });

    }
}
