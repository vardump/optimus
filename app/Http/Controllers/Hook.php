<?php

namespace App\Http\Controllers;

use App\chatbot;
use Guzzle\Http\Client;
use Illuminate\Http\Request;

use App\Http\Requests;

class Hook extends Controller
{
    public function index(Request $re)
    {


        $challenge = $re->hub_challenge;
        $verify_token = $re->hub_verify_token;
        
        if ($verify_token === 'prappo') {
            return $challenge;
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $sender = (isset($input['entry'][0]['messaging'][0]['sender']['id']))?$input['entry'][0]['messaging'][0]['sender']['id']:"";



        $question = isset($input['entry'][0]['messaging'][0]['message']['text']) ? $input['entry'][0]['messaging'][0]['message']['text'] : "help";
        $mid = isset($input['entry'][0]['messaging'][0]['message']['mid']) ? $input['entry'][0]['messaging'][0]['message']['mid'] : '';
        $pageId = isset($input['entry'][0]['id']) ? $input['entry'][0]['id'] : '';
//        $token = "EAAOSOtLRz5gBAOXq3pmM9ZCIJDZBHGMScHh6uZAXL0Ez6muaIRWEbql4ZABleZBbmG5LHJVZAYjVzgHFKZCmhZCIVeWJ6F1u4ldtxyqoGFi5ig3DdVUjOFPfx4HiDvrV8e2wMUxkaM2458iE29oVxKtDZB1Oh7Q21X8X6KZBB6T29aUgZDZD";
        $token = Data::getToken($pageId);
        $url = 'https://graph.facebook.com/v2.6/me/messages?access_token=' . $token;

        $ch = curl_init($url);
        $msg = "Please write 'help' and send us";

        $am = "";
        $help = "no";
        if ($question == 'help') {
            $help="yes";
            $qu = chatbot::all();
            foreach ($qu as $q){
                $am .= $q->question . " , ";
            }
            echo $am;
            $msg = $am;

        }else{
            $data = chatbot::all();
            foreach ($data as $d) {
                if ($d->question == $question) {
                    $msg = $d->answer;
                }
            }

        }



        $jsonData = '{
                        "recipient":{
                        "id":"' . $sender . '"
                        },
                        "message":{
                        "text":"' . $msg . '"
                        }
                        }';

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

//Execute the request but first check if the message is not empty.
        if (!empty($input['entry'][0]['messaging'][0]['message'])) {
            $result = curl_exec($ch);
            $timestamp = $input['entry'][0]['time'];
            $timestamp = 1465298940;
            $datetimeFormat = 'Y-m-d H:i:s';

            $date = new \DateTime();
            $date->setTimestamp($timestamp);
            $time =  $date->format($datetimeFormat);
            try{
                $pageName = Data::getPageName($pageId);
            }
            catch (\Exception $e){
                $pageName ="";
            }

            Prappo::notify(($pageName != "")?$pageName.' Message': 'Message',$question,url('/').'/conversations/'.$pageId.'/'.$mid,'message',$time);
        }
        else{
            $timestamp = $input['entry'][0]['time'];
            $datetimeFormat = 'Y-m-d H:i:s';
            $date = new \DateTime();
            $date->setTimestamp($timestamp);
            $time =  $date->format($datetimeFormat);
            Prappo::notify('Notification',"You got a facebook notification",'https://facebook.com/','fbnotify',$time);
        }

    }

    public function test(Request $re)
    {
//        $data = chatbot::all();
//        $question = "products";
//        $answer = "";
//        foreach ($data as $d) {
//            if ($question == 'help') {
//                echo $d->question . "<br>";
//            } else {
//                if ($d->question == $question) {
//                    $answer = $d->answer;
//                }
//            }
//        }
//        if (!empty($answer)) {
//            return $answer;
//        } else {
//            return "Please type 'help' and send us";
//        }

        $data = chatbot::all('question')->toArray();
        print_r(Data::botButton('12345',$data));

    }
}