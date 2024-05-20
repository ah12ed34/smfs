<?php
namespace App\Tools;

use Illuminate\Pagination\LengthAwarePaginator;

class ToolsApp{
    // convert collection to pagination
    public static function convertToPagination($collection, $perPage = 10){
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems, count($collection), $perPage);
        $paginatedItems->setPath(LengthAwarePaginator::resolveCurrentPath());
        return $paginatedItems;
    }
}
