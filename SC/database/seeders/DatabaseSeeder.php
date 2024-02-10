<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            $user_id = DB::table('users')->insertGetId([
                'name' => 'Test User',
                'last_name' => 'Test User',
                'username' => 'admin',
                'gender' => 'male',
                'password' => Hash::make('admin'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $role_id = DB::table('roles')->insertGetId([
                'name' => 'admin',
                'description' => 'admin',
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
