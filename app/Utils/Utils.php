<?php

namespace App\Utils;

class Utils {

    public function pagination($items, $per_page = null, $page = null){
        $perPage = $per_page ?? config('pagination.per_page');
        $total = $items->count();
        $lastPage = ceil($total / $perPage);
        $currentPage = $page ?? 1;
        if ($currentPage > $lastPage) {
            $currentPage = $lastPage;
        }
        return $items->paginate($perPage, ['*'], 'page', $currentPage);
    }
}
