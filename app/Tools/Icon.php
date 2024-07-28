<?php
namespace App\Tools;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Vite;
class Icon{

    public static function getIcon(string $file = null,bool $isFile = false){
        if(!$file){
            if($isFile){
                return Vite::asset('resources/svg/not_file.svg');
            }
            return null;
        }
        $pathFile = Storage::path($file);
        if(!file_exists($pathFile)){
            return null;
        }
        $icon = pathinfo($pathFile, PATHINFO_EXTENSION);
        $icons = [
            'pdf' => 'pdf.svg',
            'doc' => 'doc.svg',
            'docx' => 'doc.svg',
            'xls' => 'xls.svg',
            'xlsx' => 'xls.svg',
            'ppt' => 'ppt.svg',
            'pptx' => 'ppt.svg',
            'txt' => 'txt.svg',
            'jpg' => 'jpg.svg',
            'zip' => 'zip.svg',
            'rar' => 'zip.svg',
            '7z' => 'zip.svg',
        ];
        if(isset($icons[$icon])){
            return Vite::asset('resources/svg/'.$icons[$icon]);
        }
        return Vite::asset('resources/svg/file.svg');
    }
}
