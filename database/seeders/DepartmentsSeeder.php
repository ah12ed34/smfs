<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dapartments = [
            ['name' => 'تكنولوجيا المعلومات'],
            ['name' => 'نظم المعلومات'],
            ['name' => 'علوم حاسب'],
            ['name' => 'امن سبراني'],
        ];

        foreach ($dapartments as $dapartment) {
            $dep = \App\Models\Department::create($dapartment);
                $dep->levels()->createMany([
                    ['name' => 'المستوى الاول'],
                    ['name' => 'المستوى الثاني'],
                    ['name' => 'المستوى الثالث'],
                    ['name' => 'المستوى الرابع'],
                ]);

                $dep->levels->each(function ($level) {
                    if($level->name == 'المستوى الاول'){
                        DB::table('subjects_levels')->insert([
                            ['level_id' => $level->id, 'subject_id' => 'SUA101' , 'semester' => '1'],
                            ['level_id' => $level->id, 'subject_id' => 'SUE101' , 'semester' => '1'],
                            ['level_id' => $level->id, 'subject_id' => 'SUI100' , 'semester' => '1'],
                            ['level_id' => $level->id, 'subject_id' => 'MAT101' , 'semester' => '1'],
                            ['level_id' => $level->id, 'subject_id' => 'SUConf' , 'semester' => '1'],
                            ['level_id' => $level->id, 'subject_id' => 'CCS111' , 'semester' => '1'],
                            ['level_id' => $level->id, 'subject_id' => 'CCS100' , 'semester' => '1'],
                            ['level_id' => $level->id, 'subject_id' => 'SUA102' , 'semester' => '2'],
                            ['level_id' => $level->id, 'subject_id' => 'SUE102' , 'semester' => '2'],
                            ['level_id' => $level->id, 'subject_id' => 'MAT110' , 'semester' => '2'],
                            ['level_id' => $level->id, 'subject_id' => 'MAT111' , 'semester' => '2'],
                            ['level_id' => $level->id, 'subject_id' => 'CCS110' , 'semester' => '2'],
                            ['level_id' => $level->id, 'subject_id' => 'SUNC' , 'semester' => '2'],
                            ['level_id' => $level->id, 'subject_id' => 'CS201' , 'semester' => '2'],
                        ]);
                    }

                });
        }
    }
}
