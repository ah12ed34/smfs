<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'phone',
        'photo',
        'gender',
        'username',
        'last_name',
        'name',
        'email',
        'password',
        'email_verified_at',
        'birthday',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function Roles(){
        return $this->belongsToMany(Role::class);
    }

    public function Permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function isAdmin(): bool{
        return $this->hasRole('admin');
        return false;
    }
    public function hasRole($name, int $user_id = null): bool{
        if(DB::table('roles')->where('name',$name)->exists()){

            if(DB::table('roles')->select('roles.*')->where('name',$name)->join('has_role','roles.id','=','has_role.role_id')->where('has_role.user_id',$user_id ?? $this->id)->exists()){
                return true;
            }
        }
        return false;
    }
    public function hasPermission($name, int $user_id = null): bool{

            if($this->isAdmin()){
                return true;
            }else
            if(DB::table('permissions')->select('permissions.*')->where('name',$name)->join('has_permission_user','permissions.id','=','has_permission_user.permission_id')->where('has_permission_user.user_id',$user_id ?? $this->id)->exists()){
                return true;
            }elseif(DB::table('permissions')->select('permissions.*')->where('name',$name)->join('has_permission','permissions.id','=','has_permission.role_id')
                                                                                        ->join('has_role','has_permission.role_id','=','has_role.role_id')
            ->where('has_role.user_id',$user_id ?? $this->id)->exists()){
                return true;
            }
        return false;

    }

    public function isStudent(): bool{
        return DB::table('students')->where('user_id',$this->id)->exists();
    }
    public function isAcademic(): bool{
        return DB::table('academics')->where('user_id',$this->id)->exists();
    }

    public function isTeacher(): bool{
        return DB::table('teachers')->where('user_id',$this->id)->exists();
    }

    public function student(){
        if($this->isStudent()){
            return $this->hasOne(Student::class,'user_id','id');
        }
        return null;
    }

    public function academic(){
        if($this->isAcademic()){
            return $this->hasOne(Academic::class,'user_id','id');
        }
        return null;
    }

    public function gender_ar(){
        return match($this->gender){
            'male' => 'ذكر',
            'female' => 'أنثى',
        }
            ;
    }
    public function getFullNameAttribute(){
        return $this->name . ' ' . $this->last_name;
    }
}
