<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ////             'StudentAffairs'=>"شؤون الطلاب",
            // 'EmployeeAffairs'=>"شؤون الموظفين",
            // 'Control'=>"كنترول",
            // 'QualityManagement'=>"إدارة الجودة",
            // 'SechadulesManagement'=>"إدارة الجداول",
            // 'DepartmentsManagement'=>"إدارة الأقسام",
            // 'ViceDean'=>"وكيل الكلية",
            // 'Dean'=>"عميد الكلية",
            // 'Admin'=>"مدير النظام",
            // 'SuperAdmin'=>"مدير عام",
            // 'Teacher'=>"مدرس",
        $roles = [
            ['name'=> 'QualityManagement', 'description'=> 'ادارة الجودة'],
            ['name'=> 'StudentAffairs', 'description'=> 'شؤون الطلاب'],
            ['name'=> 'EmployeeAffairs', 'description'=> 'شؤون الموظفين'],
            ['name'=> 'Control', 'description'=> 'كنترول'],
            ['name'=> 'SechadulesManagement', 'description'=> 'ادارة الجداول'],
            ['name'=> 'SuperAdmin', 'description'=> 'مدير عام'],
            ['name'=> 'Teacher', 'description'=> 'مدرس'],
            ['name'=> 'Dean', 'description'=> 'عميد'],
            ['name'=> 'ViceDeanForStudentAffairs', 'description'=> 'نائب عميد للشؤون الطلاب'],
            ['name'=> 'ViceDeanForAcademics', 'description'=> 'نائب العميد للشؤون الاكاديمية'],
            ['name'=> 'ViceDeanForQualityAffairs','description'=> 'نائب عميد للشؤون الجودة'],
            // ['name'=> 'ViceDean', 'description'=> 'نائب عميد'],
            ['name'=> 'HeadOfDepartment', 'description'=> 'رئيس قسم'],
            ['name'=> 'Admin', 'description'=> 'مدير النظام'],

        ];
        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
