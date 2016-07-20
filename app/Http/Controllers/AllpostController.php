<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AllpostController extends Controller
{
    //
    public function index(){
        $posts = \App\Allpost::all();
        return view('allpost',compact('posts'));
    }
    
    public function delFromAll(Request $re){
        $postId = $re->postId;
        
    }
}
