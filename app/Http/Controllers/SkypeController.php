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
}
