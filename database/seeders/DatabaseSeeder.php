<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            SubjectsSeeder::class,
            RolesSeeder::class,
            DepartmentsSeeder::class,
            // LevelsSeeder::class,
            // UsersSeeder::class,
            // RolesSeeder::class,
            // HasRoleSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            $user_id = DB::table('users')->insertGetId([
                'name' => 'admin',
                'last_name' => '',
                'username' => 'admin',
                'gender' => 'male',
                'password' => Hash::make('admin'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $role_id = DB::table('roles')->insertGetId([
                'name'=> 'Admin',
                'description'=> 'مدير النظام',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('has_role')->insert([
                'role_id' => $role_id,
                'user_id' => $user_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
