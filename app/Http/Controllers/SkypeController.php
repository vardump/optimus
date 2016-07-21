<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prappo\skype;

class SkypeController extends Controller
{
    //
    public function index(){
        if (Setting::where('field', 'skypePass')->exists()) {
            foreach (Setting::where('field', 'skypePass')->get() as $d) {
                if ($d->value == "") {
                    return redirect('/settings');
                }
            }
        } else {
            return redirect('/settings');
        }
        $skype = new skype\skype(Data::get('skypeUser'),Data::get('skypePass'));
        $profile = $skype->readMyProfile();
        $contacts = $skype->getContactsList();

        return view('skype',compact('profile','contacts'));
    }

    public function skypeUser($user){
        $skype = new skype\skype(Data::get('skypeUser'),Data::get('skypePass'));
        $profile = $skype->readProfile(array($user));
        $messages = $skype->getMessagesList($user);

        $userId = $user;

        return view('skypechat',compact('profile','userId','messages'));


    }

//    public function getMessage($user){
//        $skype = new skype\skype(Data::get('skypeUser'),Data::get('skypePass'));
//        $messages = $skype->getMessagesList($user);
//

//        $userId = $user;
//        foreach ($messages['messages'] as $no => $message) {
//            if (isset($message['content'])) {
//
//                if (isset($message['from'])) {
//                    $content = $message['content'];
//                    $username = str_replace("8:", "", strstr($message['from'], "8:"));
//                    echo '<img src="https://api.skype.com/users/' . $username . '/profile/avatar">' . $content . " " . "<b>$username</b>" . Prappo::date($message['composetime']) . "<br>";
//                }
//
//            }
//        }


//    }

    public function getMessage($user){
        $skype = new skype\skype(Data::get('skypeUser'),Data::get('skypePass'));
        $messages = $skype->getMessagesList($user);
        $userId = $user;
        return view('skypechatajax',compact('userId','messages'));
    }

    public function sendMessage(Request $re){
        $userId = $re->userId;
        $message = $re->message;

        $skype = new skype\skype(Data::get('skypeUser'),Data::get('skypePass'));
        try{
            $skype->sm($userId,$message);
            return "success";
        }
        catch (\Exception $e){
            return $e->getMessage();
        }

    }

    public function sendRequest(Request $re){
        $message = ($re->reqMessage == "")?"Hello, I would like to add you to my contacts.":$re->reqMessage;
        $skype = new skype\skype(Data::get('skypeUser'),Data::get('skypePass'));
        try{
            $skype->addContact($re->userName,$message);
            return "success";
        }
        catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function massSend(Request $re){
        $skype = new skype\skype(Data::get('skypeUser'),Data::get('skypePass'));
        try{

            $lists = $skype->getContactsList();
            foreach ($lists as $listno => $list) {
                try{
                    $skype->sm($list['id'],$re->message);
                    echo "<span class=\"pull-right badge bg-green\">Message sent to {$list['id']}</span>";
                }
                catch (\Exception $d){
                    echo "<span class=\"pull-right badge bg-red\">Can't sent to {$list['id']}</span>";
//                    echo $d->getMessage();
                }
            }

        }
        catch (\Exception $e){
            return $e->getMessage();
        }
    }
}
