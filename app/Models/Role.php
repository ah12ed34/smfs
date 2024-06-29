<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected string $has_role = 'has_role';
    protected string $has_permission = 'has_permission';
    protected string $permission_id = 'permission_id';
    protected string $role_id = 'role_id';
    protected string $user_id = 'user_id';



    public function Permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function Users(){
        return $this->belongsToMany(User::class,'has_role','role_id','user_id');
    }

    public function addPermission($permission){
        if($this->isPermission($permission)){
            return ;
        }
        return DB::table($this->has_permission)->insert([
            $this->permission_id => $permission->id,
            $this->role_id => $this->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
    public function removePermission($permission){
        if($this->isPermission($permission))
        DB::table($this->has_permission)->where([
            $this->permission_id => $permission->id,
            $this->role_id => $this->id,
        ])->delete();
    }
    // public function isPermission($permission,int $role_id = null): bool{
    //     return DB::table($this->has_permission)->where([
    //         $this->permission_id => $permission->id,
    //         $this->role_id => $role_id ?? $this->id])->exists();
    // }

    public function isPermission($permission, int $role_id = null): bool {
        return DB::table($this->has_permission)->where([
            $this->permission_id => $permission->id,
            $this->role_id => $role_id ?? $this->id,
        ])->exists();
    }

    public function addUserR($user){
        if($this->isUserRole($user)){
            return ;
        }
        return DB::table($this->has_role)->insert([
            $this->user_id => $user->id,
            $this->role_id => $this->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
    public function removeUserR($user){
        if($this->isUserRole($user))
        DB::table($this->has_role)->where([
            $this->user_id => $user->id,
            $this->role_id => $this->id,
        ])->delete();
    }
    public function isUserRole($user,int $role_id = null): bool{
        return DB::table($this->has_role)->where([
            $this->role_id => $role_id ?? $this->id,
            $this->user_id => $user->id])->exists();
    }

}
