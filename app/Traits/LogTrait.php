<?php

namespace App\Traits;

use App\Models\Log;

trait LogTrait
{
    function logs( $key = null, $name_ar,$name_en,$action,$model)
    {
        $log = new Log();
        $log->user_id = auth()->user()->id;
        $log->key = $key;
        $log->name_ar = $name_ar;
        $log->name_en = $name_en;
        $log->model = $model;
        $log->branch_id = auth()->user()->branch_id;
        $log->vendor_id = auth()->user()->vendor_id;
        $log->action = $action;
        $log->save();
    }

}


