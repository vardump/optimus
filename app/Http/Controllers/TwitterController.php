<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TwitterController extends Controller
{
    public function index(){
        if(Setting::where('field','twTokenSec')->exists()){
            foreach (Setting::where('field','twTokenSec')->get() as $d){
                if($d->value == ""){
                    return redirect('/settings');
                }
            }
        }
        else{
            return redirect('/settings');
        }

        $consumerKey = FollowersController::get_value('twConKey');
        $consumerSecret = FollowersController::get_value('twConSec');
        $accessToken = FollowersController::get_value('twToken');
        $tokenSecret = FollowersController::get_value('twTokenSec');

        $twitter = new \Twitter($consumerKey, $consumerSecret, $accessToken, $tokenSecret);

        $me = $twitter->load(\Twitter::ME);
        $twRep = $twitter->load(\Twitter::REPLIES);
        $tw = $twitter->load(\Twitter::ME_AND_FRIENDS);
        return view('Twitter',compact('tw','twRep','me'));
    }

    public function getInboxIndex(){
        
    }

    public function retweet(Request $re){
        $id = $re->id;
        $consumerKey = Followers::get_value('twConKey');
        $consumerSecret = Followers::get_value('twConSec');
        $accessToken = Followers::get_value('twToken');
        $tokenSecret = Followers::get_value('twTokenSec');

        $twitter = new \Twitter($consumerKey, $consumerSecret, $accessToken, $tokenSecret);
        try{
            $data = $twitter->request('statuses/retweet','POST',array('id'=>$id));
            print_r($data);
        }
        catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function twSendMsg(Request $re){
        $username = $re->username;
        $text = $re->text;
        $consumerKey = Followers::get_value('twConKey');
        $consumerSecret = Followers::get_value('twConSec');
        $accessToken = Followers::get_value('twToken');
        $tokenSecret = Followers::get_value('twTokenSec');

        $twitter = new \Twitter($consumerKey, $consumerSecret, $accessToken, $tokenSecret);
        try{
            $data = $twitter->request('direct_messages/new','POST',array('screen_name'=>$username,'text'=>$text));
            print_r($data);
        }
        catch (\Exception $e){
            return $e->getMessage();
        }
    }

}
