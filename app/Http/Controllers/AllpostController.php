<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AllpostController extends Controller
{

    /**
     *  show all posts view
     */
    public function index()
    {
        $posts = \App\Allpost::all();
        return view('allpost', compact('posts'));
    }

    /**
     * @param Request $re
     * delete all post from social media
     */
    public function delFromAll(Request $re)
    {
        $postId = $re->postId;

    }
}
