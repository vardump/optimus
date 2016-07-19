<?php

namespace App\Http\Controllers;

use App\FacebookPages;
use App\Setting;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;

use App\Http\Requests;

class Conversation extends Controller
{
    public function index(){
        if(Setting::where('field','fbAppSec')->exists()){
            foreach (Setting::where('field','fbAppSec')->get() as $d){
                if($d->value == ""){
                    return redirect('/settings');
                }
            }
        }
        else{
            return redirect('/settings');
        }
        $fb = new Facebook([
            'app_id' => Data::get('fbAppId'),
            'app_secret' => Data::get('fbAppSec'),
            'default_graph_version' => 'v2.6',
        ]);

        try{
            $data = $fb->get('me/accounts?fields=id,name,picture,fan_count,category,cover',Data::get('fbAppToken'))->getDecodedBody();

        }
        catch (FacebookResponseException $r){
            return $r->getMessage();
        }
        catch (FacebookSDKException $sdk){
            return $sdk->getMessage();
        }

        return view('conversation',compact('data'));
    }

    public function inbox($pageId,$cId){

        $fb = new Facebook([
            'app_id' => Data::get('fbAppId'),
            'app_secret' => Data::get('fbAppSec'),
            'default_graph_version' => 'v2.6',
        ]);
        $me = $pageId;
        $pageToekn = FacebookPages::where('pageId',$pageId)->get();
        foreach($pageToekn as $t){
            $token = $t->pageToken;
        }


        try{
            $response = $fb->get($cId.'?fields=participants{id,name,email,picture},messages{message,from,created_time},message_count',$token)->getDecodedBody();

        }
        catch (FacebookResponseException $rs){
            return $rs->getMessage();
        }
        catch (FacebookSDKException $sdk){
            return $sdk->getMessage();
        }

        return view('chat',compact('response','me'));
    }

    public function getConversations($pageId){
        $fb = new Facebook([
            'app_id' => Data::get('fbAppId'),
            'app_secret' => Data::get('fbAppSec'),
            'default_graph_version' => 'v2.6',
        ]);

        $pageToekn = FacebookPages::where('pageId',$pageId)->get();
        foreach($pageToekn as $t){
            $token = $t->pageToken;
        }



        try {
            $data = $fb->get($pageId.'?fields=id,picture,name,conversations{participants{id,name,picture},message_count,snippet,unread_count,senders}',$token)->getDecodedBody();

        } catch (FacebookSDKException $fsdk) {
            return $fsdk->getMessage() . " [fbc fsdk]";
        } catch (FacebookResponseException $fbr) {
            return $fbr->getMessage() . " [fbc fbr]";
        }

        return view('conpage',compact('data'));



    }

    public function ajaxGetConversations($pageId,$cId){
        $fb = new Facebook([
            'app_id' => Data::get('fbAppId'),
            'app_secret' => Data::get('fbAppSec'),
            'default_graph_version' => 'v2.6',
        ]);
        $me = $pageId;
        $pageToekn = FacebookPages::where('pageId',$pageId)->get();
        foreach($pageToekn as $t){
            $token = $t->pageToken;
        }


        try{
            $response = $fb->get($cId.'?fields=participants{id,name,email,picture},messages{message,from,created_time},message_count',$token)->getDecodedBody();
//            print_r($response);
//            exit;
        }
        catch (FacebookResponseException $rs){
            return $rs->getMessage();
        }
        catch (FacebookSDKException $sdk){
            return $sdk->getMessage();
        }

        return view('ajaxchat',compact('response','me'));

    }

    public function chat(Request $re){
        $conId = $re->conId;
        $pageId = $re->pageId;
        $message = $re->message;
        $fb = new Facebook([
            'app_id' => Data::get('fbAppId'),
            'app_secret' => Data::get('fbAppSec'),
            'default_graph_version' => 'v2.6',
        ]);

        $pageToekn = FacebookPages::where('pageId',$pageId)->get();
        foreach($pageToekn as $t){
            $token = $t->pageToken;
        }


        try {

            $fb->post($conId.'/messages',['message'=>$message],$token);
            return "success";

        } catch (FacebookSDKException $fsdk) {
            return $fsdk->getMessage() . " [fbc fsdk]";
        } catch (FacebookResponseException $fbr) {
            return $fbr->getMessage() . " [fbc fbr]";
        }

        return view('conpage',compact('data'));


    }
}
