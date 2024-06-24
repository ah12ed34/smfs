<?php
namespace App\Tools;

use App\Models\File;
use App\Models\Delivery;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class ToolsApp{
    // convert collection to pagination
    public static function convertToPagination($collection, $perPage = 10){
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems, count($collection), $perPage);
        $paginatedItems->setPath(LengthAwarePaginator::resolveCurrentPath());
        return $paginatedItems;
    }
    public static function convertToPaginationAll($collection, $perPage = 10,$pageName = 'page'){

        // $pageName = coustom page name
        $currentPage = LengthAwarePaginator::resolveCurrentPage($pageName);
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginatedItems= new LengthAwarePaginator($currentPageItems, count($collection), $perPage,$currentPage);
        $paginatedItems->setPageName($pageName);
        $paginatedItems->setPath(LengthAwarePaginator::resolveCurrentPath());
        return $paginatedItems;
    }
    // download file
    public static function downloadFile($id,$name,$type = 'file', $fileS = 'file'){
        $file = null;
        if($type == 'file')
            $file = $fileS == 'file' ? File::find($id)->file : ($fileS == 'file2' ? File::find($id)->file2 : File::find($id)->file3);
        elseif($type == 'delivery')
            $file = $fileS == 'file' ? Delivery::find($id)->file : ($fileS == 'file2' ? Delivery::find($id)->file2 : Delivery::find($id)->file3);

        if($file&&Storage::exists($file)){
            return Storage::download($file, $name);
        }else{
            return response()->json(['message' => 'File not found'], 404);
        }
    }
}
