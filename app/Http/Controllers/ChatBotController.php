<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ChatBotController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = \App\chatbot::all();
        return view('chatbot', compact('data'));
    }

    /**
     * @param Request $re
     * @return string
     */
    public function addQuestion(Request $re)
    {
        /** @var string $question */
        $question = $re->question;
        /** @var string $answer */
        $answer = $re->answer;

        try {
            $data = new \App\chatbot();
            $data->question = $question;
            $data->answer = $answer;
            $data->save();
            return "success";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param Request $re
     * @return string
     */
    public function delQuestion(Request $re)
    {
        /** @var int $id */
        $id = $re->id;
        try {
            \App\chatbot::where('id', $id)->delete();
            return "success";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
