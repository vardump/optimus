<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Op extends Controller
{
    public static function date($dateString){
        $date = strtotime($dateString);
        return date('d/M/Y (h:m:s)', $date);
    }
}
