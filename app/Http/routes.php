<?php

Route::get('/', function () {
    return redirect('home');
});

Route::get('/fbconnect', 'Settings@fbconnect');

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/write', 'Write@index');
    Route::get('/posttest', 'Write@postTest');

//    settings pages
    Route::get('/settings', 'Settings@index');
    Route::get('/settings/notifications', 'Settings@notifyIndex');
    Route::get('/reports', 'Reports@index');

    Route::get('/followers', 'Followers@index');
    Route::get('/gettwfoll', 'Followers@showTwFollowers');
    Route::get('/showalltwfollowers', 'Followers@showAllTwFollowers');

    Route::get('/satf', function () {
        return view('showAllTwFollowers');
    });

//    dashboard activities
    Route::get('/fblikes', 'HomeController@fbLikes');
    Route::get('/twfollowers', 'HomeController@twFollowers');
    Route::get('/tufollowers', 'HomeController@tuFollowers');

    Route::get('/allpost', 'allpost@index');

    Route::get('/facebook', 'Facebook@index');
    Route::get('/twitter', 'Twitter@index');
    Route::get('/tumblr', 'Tumblr@index');
    Route::get('/wordpress', 'Wordpress@index');

    Route::post('/wpwrite', 'Write@wpWrite');
    Route::post('/twwrite', 'Write@twWrite');
    Route::post('/fbwrite', 'Write@fbWrite');
    Route::post('/fbgwrite', 'Write@fbgwrite');
    Route::post('/tuwrite', 'Write@tuWrite');
    Route::post('/postwrite', 'Write@postWrite');
    Route::post('/delpost', 'Write@delPost');

    //update settings
    Route::post('/wpsave', 'Settings@wpSave');
    Route::post('/fbsave', 'Settings@fbSave');
    Route::post('/twsave', 'Settings@twSave');
    Route::post('/tusave', 'Settings@tuSave');
    Route::post('/settings/notifications', 'Settings@notifySave');

    // deleting
    Route::post('/fbdel', 'Facebook@fbDelete');

    // commenting
    Route::post('/fbcom', 'Facebook@fbComment');

    // editing 

    Route::post('/fbedit', 'Facebook@fbEdit');
//   delete twitter post
    Route::post('/twdel', 'Write@twDelete');
//    delete tumblr post
    Route::post('/tudel', 'Write@tuDelete');
    Route::post('/tureblog', 'Write@tuReblog');

    Route::post('/iup', 'ImageUpload@iup');

    Route::post('/addschedule', 'ScheduleController@addSchedule');
    Route::get('/schedules', 'ScheduleController@index');
    Route::get('/scheduleslog', 'OptLogs@index');
    Route::post('/logdel', 'OptLogs@logDel');
    Route::post('/alllogdel', 'OptLogs@delAll');
    Route::post('/sdel', 'ScheduleController@sdel');
    Route::post('/sedit', 'ScheduleController@sedit');

    // reporting
    Route::get('/fbreport', 'Facebook@fbReport');

    Route::get('test1', function () {
        return view('test');
    });

    Route::get('/fbgroups', 'Facebook@fbGroupIndex');
    Route::get('/tusync', 'Settings@tuSync');
    Route::get('/fbmassgrouppost', 'MassFbGroup@index');
    Route::post('/savepublicgroup', 'MassFbGroup@saveGroup');
    Route::post('/postomassgroup', 'MassFbGroup@massPost');

    Route::get('/conversations', 'Conversation@index');
    Route::get('/conversations/{pageId}', 'Conversation@getConversations');
    Route::get('/conversations/{pageId}/{cId}', 'Conversation@inbox');
    Route::get('/ajaxchat/{pageId}/{cId}', 'Conversation@ajaxGetConversations');
    Route::post('/chat', 'Conversation@chat');

    Route::get('/masssend/{pageId}', 'Facebook@massSend');
    Route::get('/masssend', 'Facebook@massSendIndex');
    Route::get('/massreplay/{pageId}', 'Facebook@massReplay');

    Route::get('/chatbot', 'ChatBot@index');
    Route::post('/addquestion', 'ChatBot@addQuestion');
    Route::post('/delquestion', 'ChatBot@delQuestion');

    Route::any('/hook', 'Hook@index');
    Route::get('/hook/test', 'Hook@test');
    Route::post('/langsave', 'Settings@lang');

    Route::get('/scraper', 'Scraper@index');
    Route::post('/scraper', 'Facebook@scraper');

//    notifications
    Route::post('/notify', 'Notify@insert');
    Route::get('/notify', 'Notify@show');
    Route::post('/allnotifydel', 'Notify@delAll');
    Route::get('/tw/scraper', 'Scraper@twScraper');
    Route::post('/tw/scraper', 'Scraper@twitterScrapper');

});
