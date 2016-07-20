<?php

namespace App\Http\Controllers;

use App\Wp;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WordpressController extends Controller
{
    public function index()
    {
        $data = Wp::all();
        return view('Wordpress',compact('data'));
    }

    public function wpDel(Request $re)
    {
        $wpId = $re->wpId;
        $url = Data::get('wpUrl');
        $userName = Data::get('wpUser');
        $password = Data::get('wpPassword');
        $delQuery = 'DELETE FROM wordpress.post WHERE username="' . $userName . '" and password="' . $password . '" and blogurl="' . $url . '" and postid="' . $wpId . '"';
        $url = 'http://query.yahooapis.com/v1/public/yql?q=' . urlencode($delQuery) . '&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
        $rawdata = curl_exec($c);
        $json = json_decode($rawdata, true);
        if (isset($json['query']['results']['methodResponse']['params']['param']['value']['boolean'])) {
            echo "success";
        } else {
            echo "something went wrong";
        }
        curl_close($c);
    }
}
