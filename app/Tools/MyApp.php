<?php
    namespace App\Tools;

    class MyApp
{
    const perPage = 10;
    const perPageLists = 5;
    const perPageItems = 10;
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
                case 'schedule':
                return self::getMimes('image');
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
    /***
     * @param null $name
     * @param null $only {key or value} if key return key else return value default all
     * @return array
     */
    public static function getAcademicNameAllOut($name = null,$only = null)
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

        if('key' == strtolower($only ?? ''))
            return array_keys($academic);
        elseif('value' == strtolower($only ?? ''))
            return array_values($academic);

        return $academic;
    }

    public static function getGender($name)
    {
        return match($name)
        {
            'male' => __('general.male'),
            'female' => __('general.female'),
            'all' => __('general.all'),
            default => __('general.unknown'),
        };
    }
    /***
     * @param null $name
     * @param null $only {key or value} if key return key else return value default all
     * @return array
     */
    public static function getGenderAllOut($name = null,$only = null)
    {
        $gender = [];

        if('male' != $name)
            $gender['male'] = __('general.male');
        if('female' != $name)
            $gender['female'] = __('general.female');
        if('key' == strtolower($only ?? ''))
            return array_keys($gender);
        elseif('value' == strtolower($only ?? ''))
            return array_values($gender);
        return $gender;
    }

    // النظام الدراسي موزي او عام
    public static function getSystem($name)
    {
        return match($name)
        {
            'general' => __('general.general'),
            'parallel' => __('general.parallel'),
            'all' => __('general.all'),
            default => __('general.unknown'),
        };
    }

    /***
     * @param null $name
     * @param null $only {key or value} if key return key else return value default all
     * @return array
     */
    public static function getSystems($name = null,$only = null)
    {
        $systems = [];

        if('general' != $name)
            $systems['general'] = __('general.general');
        if('parallel' != $name)
            $systems['parallel'] = __('general.parallel');

        if('key' == strtolower($only ?? ''))
            return array_keys($systems);
        elseif('value' == strtolower($only ?? ''))
            return array_values($systems);

        return $systems;
    }

    public static function getStudentGender($name)
    {
        return match($name)
        {
            'male' => 'طلاّب',
            'female' => 'طالبات',
            'all' => 'طلاب وطالبات',
            default => 'غير معروف',
        };
    }

    public static function getStudentGenders($name = null,$only = null)
    {
        $gender = [];

        if('male' != $name)
            $gender['male'] = 'طلاّب';
        if('female' != $name)
            $gender['female'] = 'طالبات';
        if('all' != $name)
            $gender['all'] = 'طلاب وطالبات';
        if('key' == strtolower($only ?? ''))
            return array_keys($gender);
        elseif('value' == strtolower($only ?? ''))
            return array_values($gender);
        return $gender;

    }


}
