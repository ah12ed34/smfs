<?php

namespace App\Models;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'department_id',
        'level_id',
        'is_active',
        'is_graduated',
        'is_suspended',
    ];
    public static function create_student($request): bool {
        try {
            $userData = [
                'id' => $request->id,
                'phone' => $request->phone ?? null,
                'photo' => $request->photo ?? null,
                'name' => $request->name,
                'gender'=> $request->gender,
                'last_name' => $request->last_name,
                'username' => $request->username??$request->id,
                'email' => $request->email,
                'password' => $request->password,
            ];
    
            $user = User::create($userData);
    
            if ($user) {
                $studentData = [
                    'user_id' => $user->id,
                    'department_id' => $request->department_id,
                    'level_id' => $request->level_id,
                    'is_active' => $request->is_active ?? true,
                    'is_graduated' => $request->is_graduated ?? false,
                    'is_suspended' => $request->is_suspended ?? false,
                ];
    
                $student = Student::create($studentData);
    
                return $student !== null;
            }
    
            return false;
        } catch (\Exception $e) {
            // يمكنك أيضًا تسجيل الخطأ في السجل أو إعادة رميه إذا لزم الأمر
            // echo($e->getMessage());
            throw $e;
            return false;
        }
    }

    public function getFullNameAttribute() {
        return $this->user->name . ' ' . $this->user->last_name;
    }
    public function edit_student($id,$request): bool{

        $userData =[
            'id' => $request->id,
            'phone' => $request->phone ?? null,
            'photo' => $request->photo ?? null,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'username' => $request->username??$request->id,
            'email' => $request->email,
            'password' => $request->password,

        ];
        $user = User::where('id',$id)->update($userData);
        if($user){
            $studentData = [
                'user_id' => $user->id,
                'department_id' => $request->department_id,
                'level_id' => $request->level_id,
                'is_active' => $request->is_active ?? true,
                'is_graduated' => $request->is_graduated ?? false,
                'is_suspended' => $request->is_suspended ?? false,
            ];
            $student = Student::where('user_id',$id)->update($studentData);
            return $student !== null;
        }
        return false;
    }
    


    public function studying() {
        return $this->hasMany(Studying::class);
    }

    public function level() {
        return $this->belongsTo(Level::class);
    }
    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
     
}
