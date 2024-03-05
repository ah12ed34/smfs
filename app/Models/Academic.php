<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Academic extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id',
        'department_id',
        'status',
        'academic_name',
        'schedule',
        'name',
    ];
    public static function create($parameters): bool
    {
        $user = null;
        try {
            $userData = [
                'name' => $parameters['name'],
                'id' => $parameters['id'] ?? null,
                'phone' => $parameters['phone'] ?? null,
                'photo' => $parameters['photo'] ?? null,
                'gender'=> $parameters['gender'],
                'last_name' => $parameters['last_name'],
                'username' => $parameters['username'],
                'email' => $parameters['email'],
                'password' => $parameters['password'],
            ];

            $user = User::create($userData);

            if ($user) {
                $academicData = [
                    'user_id' => $user->id,
                    'department_id' => $parameters['department_id'],
                    'status' => $parameters['status'] ?? null,
                    'academic_name' => $parameters['academic_name'] ?? null,
                    'schedule' => $parameters['schedule'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                return DB::table('academics')->insert($academicData);
            }
        } catch (\Exception $e) {
            if ($user) $user->delete();
            throw $e;
            return false;
        }

        return false;
    }

    public function user() {
        return $this->hasOne(User::class);
    }
    public function department() {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
    public function courses() {
        return $this->hasMany(groupSubject::class);
    }
    public function subjects() {
        return $this->hasMany(Subject::class);
    }

}
