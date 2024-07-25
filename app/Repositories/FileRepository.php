<?php

namespace App\Repositories;

use Illuminate\Support\Str;

class FileRepsitory
{
    function containsArabic($text)
    {
        return preg_match('/\p{Arabic}/u', $text);
    }

    public $students_degree_header = [
        'excellent' => 'ممتاز',
        'very_good' => 'جيد جدا',
        'good' => 'جيد',
        'pass' => 'ناجح',
        'fail' => 'راسب',
    ];
    public $students_grade_header
    = [
        'id' => 'الرقم الجامعي',
        'helf_exam' => 'الاختبار النصفي',
        'exam' => 'الاختبار النهائي',
        'participation' => 'المشاركة',
    ];
    private function getColumnName($header, $arabicColumns, $englishColumns): ?string
    {
        // $language = Str::of($header)->contains($arabicColumns) ? 'arabic' : 'english';
        return Str::of($header)->contains($arabicColumns) ?
            $englishColumns[array_search($header, $arabicColumns)] : (array_search($header, $englishColumns) !== false ?
                $englishColumns[array_search($header, $englishColumns)] : null);
    }
    protected function getStudentDegree($cell)
    {
        return $this->containsArabic($cell) ? array_search($cell, $this->students_degree_header)
        : array_search($cell,array_keys($this->students_degree_header));
    }
    protected function getStudentGrade($cell)
    {
        return $this->containsArabic($cell) ? array_search($cell, $this->students_grade_header)
        : array_search($cell,array_keys($this->students_grade_header));
    }
}
