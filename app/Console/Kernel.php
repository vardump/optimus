<?php

namespace App\Console;

use App\Http\Controllers\Data;
use App\Http\Controllers\Write;
use App\OptSchedul;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('inspire')
//                 ->hourly();
//
        $schedule->call(function(){

            $schedule = OptSchedul::where('type','everyMinute')->get();
            foreach($schedule as $data){
                if($data->fb == 'yes'){
                    Write::fbWriteS($data->postId,$data->pageId,$data->pageToken,$data->title,$data->caption,$data->link,$data->image,$data->description,$data->content,$data->imagetype,$data->sharetype,$data->type);
                }
                if ($data->fbg == 'yes'){
                    Write::fbgWriteS($data->postId,$data->pageId,$data->title,$data->caption,$data->link,$data->image,$data->description,$data->content,$data->imagetype,$data->sharetype);
                }
                if ($data->tw == 'yes'){
                    Write::twWriteS($data->postId,$data->image,$data->content,$data->type);
                }
                if($data->tu == 'yes'){
                    Write::tuWriteS($data->postId,$data->blogName,$data->title,$data->content,$data->image,$data->imagetype,$data->type);
                }
                if ($data->wp == 'yes'){
                    Write::wpWriteS($data->postId,$data->title,$data->content,$data->type);
                }
                
            }
            
        })->everyMinute();

        $schedule->call(function (){

        })->everyFiveMinutes();

        $schedule->call(function (){

        })->everyTenMinutes();

        $schedule->call(function (){

        })->everyThirtyMinutes();

        $schedule->call(function (){

        })->hourly();

        $schedule->call(function (){

        })->daily();

        $schedule->call(function (){
            
        })->weekly();
        
        $schedule->call(function (){
            
        })->monthly();

        $schedule->call(function (){

        })->quarterly();

        $schedule->call(function (){

        })->yearly();

        $schedule->call(function (){

        })->fridays();

        $schedule->call(function (){

        })->saturdays();

        $schedule->call(function (){

        })->sundays();

        $schedule->call(function (){

        })->mondays();

        $schedule->call(function (){

        })->tuesdays();

        $schedule->call(function (){

        })->wednesdays();

        $schedule->call(function (){

        })->thursdays();
        
        
    }
}
