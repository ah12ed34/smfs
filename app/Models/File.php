<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tools\Icon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Vite;

class File extends Model
{
    use HasFactory;
    /*
          $table->id();
            $table->string("name");
            $table->string("file")->nullable();
            $table->string("file2")->nullable();
            // description
            $table->text("description")->nullable();
            $table->integer('onChapter')->nullable();
            $table->enum('type',['assaignment','chapter','form_exem','summary']);
            $table->boolean("is_active")->default(true);
            $table->decimal('grade', 3, 2)->nullable();
            $table->foreignId("subject_id")->constrained("group_subjects");
            $table->foreignId("user_id")->constrained("users")->nullable();
            $table->date('start_date');
            $table->date('due_date');
            $table->timestamps();
    */
    protected $fillable = [
        'name',
        'file',
        'file2',
        'description',
        // 'onChapter',
        'type',
        // 'is_active',
        // 'grade',
        // 'subject_id',
        'user_id',
        // 'start_date',
        // 'due_date',
    ];
    protected static function boot(){
        parent::boot();
        static::deleted(function($file){
            if($file->file){
                Storage::delete($file->file);
            }
            if($file->file2){
                Storage::delete($file->file2);
            }
        });
    }
    public function group_files(){
        return $this->hasMany(GroupFile::class);
    }

    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function group_file(){
        return $this->hasOne(GroupFile::class);
    }

    public function GroupSubjects(){
        return $this->hasManyThrough(GroupSubject::class,GroupFile::class,'file_id','id','id','group_subject_id');
    }


    public function icon(){
        return Icon::getIcon($this->file);
    }


}
