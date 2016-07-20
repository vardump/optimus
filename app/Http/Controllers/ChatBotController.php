<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ChatBotController extends Controller
{
    public function index(){
        $data = \App\chatbot::all();
        return view('chatbot',compact('data'));
    }

    public function addQuestion(Request $re){
        $question = $re->question;
        $answer = $re->answer;

        try{
            $data = new \App\chatbot();
            $data->question = $question;
            $data->answer = $answer;
            $data->save();
            return "success";
        }
        catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function delQuestion(Request $re){
        $id = $re->id;
        try{
            \App\chatbot::where('id',$id)->delete();
            return "success";
        }
        catch (\Exception $e){
            return $e->getMessage();
        }
    }
}
