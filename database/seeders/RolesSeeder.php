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
        //
        $roles = [
            // ['name'=> 'admin', 'description'=> 'admin'],
            ['name'=> 'QualityManagement', 'description'=> 'ادارة الجودة'],
            ['name'=> 'StudentAffairs', 'description'=> 'شؤون الطلاب'],
            ['name'=> 'AcademicAffairs', 'description'=> 'شؤون اكاديمية'],
            ['name'=> 'FinancialAffairs', 'description'=> 'شؤون مالية'],
            ['name'=> 'Library', 'description'=> 'مكتبة'],
            ['name'=> 'HR', 'description'=> 'موارد بشرية'],
            ['name'=> 'IT', 'description'=> 'تقنية المعلومات'],
            ['name'=> 'Registrar', 'description'=> 'سجلات'],
            ['name'=> 'Admission', 'description'=> 'قبول'],
            ['name'=> 'Exams', 'description'=> 'امتحانات'],
            ['name'=> 'PublicRelations', 'description'=> 'علاقات عامة'],
            ['name'=> 'LegalAffairs', 'description'=> 'شؤون قانونية'],
            ['name'=> 'CommunityService', 'description'=> 'خدمة المجتمع'],
            ['name'=> 'Dean', 'description'=> 'عميد'],
            ['name'=> 'ViceDean', 'description'=> 'نائب عميد'],
            ['name'=> 'HeadOfDepartment', 'description'=> 'رئيس قسم'],


            // ['name'=> 'Instructor', 'description'=> 'محاضر'],
            // ['name'=> 'Student', 'description'=> 'طالب'],
            // ['name'=> 'Parent', 'description'=> 'ولي امر'],
            // ['name'=> 'Guest', 'description'=> 'زائر'],
        ];
        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
