<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;

class studentsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $filePath = Storage::path("public\std_IT4.xlsx"); 
        $spreadsheet = IOFactory::load($filePath);
        $sheetData =array_merge($spreadsheet->getSheet(0)->toArray());
        $user = array();
        $i = 0;
        foreach ($sheetData as $key => $value) {
            if(!preg_match('/^\d{2}_\d{2}_\d{4}$|^\d{8}$/', $value[0]))
                continue;
            elseif($value[0] == null||$value[1] == null)
                continue;
            $i++;
            // $user[$i]['id'] = str_replace('_', '', $value[0]);
            $spletted = explode(' ', $value[1]);
            $last_name = $spletted[sizeof($spletted)-1];
            // $user[$i]['name'] =str_replace(' '.$last_name, '', $value[1]);
            // $user[$i]['last_name'] =  $last_name;
            Student::create_student([
                "id" => str_replace('_', '', $value[0]),
                "name" => str_replace(' ' . $last_name, '', $value[1]),
                "last_name" => $last_name,
                'password' => 1230,
                'gender' => 'male',
                'department_id' => 161,
                'level_id' => 1614
            ]);
        }
    }
}
