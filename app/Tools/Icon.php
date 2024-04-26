<?php
namespace App\Tools;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Vite;
class Icon{

    public static function getIcon(string $file){
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
        ];

        return Vite::asset('resources/svg/'.$icons[$icon] ?? 'file.svg');
    }
}
