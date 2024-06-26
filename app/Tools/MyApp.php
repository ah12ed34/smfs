<?php
    namespace App\Tools;

    class MyApp
{
    const parPage = 10;
    const parPageLists = 5;
    const parPageItems = 10;
    const viewPagination = 'vendor.livewire.bootstrap';

    public static function getFileMime($name)
    {
        switch($name){
            case 'project':
                return self::getMimes('allZip')
                .','.self::getMimes('pdf').','.self::getMimes('doc').','.self::getMimes('ppt')
                .','.self::getMimes('image')
                ;
                break;
        }
    }

    public static function getFileSize($name)
    {
        switch($name){
            case 'project':
                return 1024;
                break;
        }
    }

    public static function getMimes($type)
    {
        switch ($type) {
            case 'image':
                return 'jpeg,jpg,png';
                break;
            case 'pdf':
                return 'pdf';
                break;
            case 'doc':
                return 'doc,docx';
                break;
            case 'excel':
                return 'xls,xlsx';
                break;
            case 'ppt':
                return 'ppt,pptx';
                break;
            case 'zip':
                return 'zip';
                break;
            case 'rar':
                return 'rar';
            case '7z':
                return '7z';
                break;
            case 'video':
                return 'mp4,avi,mov,wmv';
                break;
            case 'audio':
                return 'mp3,wav';
                break;
            case 'allZip':
                return 'zip,rar,7z';
                break;
            default:
                return 'jpeg,jpg,png';
                break;
        }
    }

    public static function getAcademicName($name)
    {
        return match($name) {
            'professor' => __('general.professor'),
            'assistant_professor' => __('general.assistant_professor'),
            'doctor' => __('general.doctor'),
            'associate_professor' => __('general.associate_professor'),
            default => __('general.unknown'),
        };
    }

    public static function getAcademicNameAllOut($name)
    {
        $academic = [];

        if('professor' != $name)
            $academic['professor'] = __('general.professor');
        if('assistant_professor' != $name)
            $academic['assistant_professor'] = __('general.assistant_professor');
        if('doctor' != $name)
            $academic['doctor'] = __('general.doctor');
        if('associate_professor' != $name)
            $academic['associate_professor'] = __('general.associate_professor');
        return $academic;
    }

    public static function getGender($name)
    {
        return match($name)
        {
            'male' => __('general.male'),
            'female' => __('general.female'),
            default => __('general.unknown'),
        };
    }

    public static function getGenderAllOut($name)
    {
        $gender = [];

        if('male' != $name)
            $gender['male'] = __('general.male');
        if('female' != $name)
            $gender['female'] = __('general.female');
        return $gender;
    }


}
