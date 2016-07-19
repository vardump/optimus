<?php

namespace App\Http\Controllers;

use App\OptLog;
use Illuminate\Http\Request;

use App\Http\Requests;


class OptLogs extends Controller
{
    public function index()
    {
        $datas = OptLog::all();
        return view('schedules_log',compact('datas'));
    }

    public function logDel(Request $re){
        $id = $re->id;
        try{
            OptLog::where('id',$id)->delete();
            return 'success';
        }
        catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function delAll()
    {
        try {
            OptLog::truncate();
            return "success";
        }
        catch (\Exception $e){
            return $e->getMessage();
        }
    }
}
