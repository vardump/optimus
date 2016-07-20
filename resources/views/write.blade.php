<div id="lang"></div>
@extends('layouts.app')
@section('title','Write')

@section('css')
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="{{ elixir('js/custom.js') }}"></script>
    <script src="opt/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="opt/sweetalert.css">

@endsection

@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')

        <div class="content-wrapper">
            <section class="content">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Write & schedule once post everywhere <i class="fa fa-edit"></i></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                @if($l=='yes')

                                    <div data-step="1" data-intro="Write your own language by change from dropdown" class="form-group">
                                        <input class="iCheck-helper" type="checkbox" id="checkboxId"
                                               onclick="javascript:checkboxClickHandler()">
                                        Type in <select id="languageDropDown"
                                                        onchange="javascript:languageChangeHandler()"></select>
                                        Press Ctrl+g to change <br><br>
                                    </div>
                                @endif
                                <div data-step="2" data-intro="Title for your post , Title only available for facebook ,wordpress and tumblr" class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input id="dataTitle" class="form-control"
                                                   placeholder="Title .. "
                                                   type="text">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input id="caption" type="text" class="form-control"
                                                   placeholder="Caption for facebook ">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input id="link" type="text" class="form-control"
                                                   placeholder="Link for facebook ">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form id="uploadimage" method="post" enctype="multipart/form-data">
                                                <label>Select Your Image</label><br/>
                                                <input class="btn btn-xs btn-primary" type="file" name="file"
                                                       id="file"/>
                                                <input class="btn btn-xs btn-success" type="submit" value="Upload"
                                                       id="imgUploadBtn"/>
                                                <input type="hidden" id="image">
                                                <div id="imgMsg"></div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input id="description" type="text" class="form-control"
                                                   placeholder="Description for facebook">
                                        </div>

                                    </div>
                                    <br>
                                </div>
                                {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                {{--<input type="checkbox" id="imagetype">--}}
                                {{--Image Post--}}
                                {{--</label>--}}
                                {{--<label>--}}
                                {{--<input type="checkbox" id="shared">--}}
                                {{--S--}}
                                {{--</label>--}}
                                {{--</div>--}}


                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="r" id="imagetype" value="imagetype"
                                                   checked="">
                                            Image Post
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="r" id="sharetype" value="sharetype">
                                            Shared Post ( facebook only )
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="r" id="texttype" value="texttype">
                                            Text Only
                                        </label>
                                    </div>

                                </div>
                                <div class="form-group">
                            <textarea class="form-control" rows="4"
                                      id="status"
                                      placeholder="Type your content here ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-control">
                                        <span>Count : </span><span id="twcount" class="label label-primary">0</span>
                                        <span id="wmsg1" class="label label-warning">..</span>
                                        <span id="msg"></span>

                                    </div>

                                    <input type="hidden" id="postId">
                                </div>
                            </div>
                            <div style="padding-left: 10px" class="form-group">
                                <div class="btn-group btn-group-xs" data-toggle="buttons">
                                    @if(\App\Setting::where('field','fbAppToken')->exists())
                                        @foreach(\App\Setting::where('field','fbAppToken')->get() as $d)
                                            @if($d->value != "")
                                                <label class="btn btn-primary bg-blue">
                                                    <input id="fbCheck" type="checkbox" autocomplete="off"><i
                                                            class="fa fa-facebook"></i>
                                                    Facebook page
                                                </label>
                                            @endif
                                        @endforeach
                                    @endif

                                    @if(\App\Setting::where('field','fbAppToken')->exists())
                                        @foreach(\App\Setting::where('field','fbAppToken')->get() as $d)
                                            @if($d->value != "")
                                                <label class="btn btn-primary bg-blue">
                                                    <input id="fbgCheck" type="checkbox" autocomplete="off"><i
                                                            class="fa fa-users"></i>
                                                    Facebook group
                                                </label>
                                            @endif
                                        @endforeach
                                    @endif

                                    @if(\App\Setting::where('field','twTokenSec')->exists())
                                        @foreach(\App\Setting::where('field','twTokenSec')->get() as $d)
                                            @if($d->value != "")
                                                <label class="btn btn-primary bg-light-blue">
                                                    <input id="twCheck" type="checkbox" autocomplete="off"><i
                                                            class="fa fa-twitter"></i>
                                                    Twitter
                                                </label>
                                            @endif
                                        @endforeach
                                    @endif
                                    @if(\App\Setting::where('field','wpPassword')->exists())
                                        @foreach(\App\Setting::where('field','wpPassword')->get() as $d)
                                            @if($d->value != "")
                                                <label class="btn btn-primary bg-blue-gradient">
                                                    <input id="wpCheck" type="checkbox" autocomplete="off"><i
                                                            class="fa fa-wordpress"></i>
                                                    Wordpress
                                                </label>
                                            @endif
                                        @endforeach

                                    @endif

                                    @if(\App\Setting::where('field','tuTokenSec'))
                                        @foreach(\App\Setting::where('field','tuTokenSec')->get() as $d)
                                            @if($d->value != "")
                                                <label class="btn btn-primary bg-gray">
                                                    <input id="tuCheck" type="checkbox" autocomplete="off"><i
                                                            class="fa fa-tumblr"></i>
                                                    Tumblr
                                                </label>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>

                            </div>

                            <div style="padding-left: 10px" class="form-group">
                            <span style="display: none" id="fbl" class="label label-default"><i
                                        class="fa fa-facebook"></i> Facebook page selected</span>

                            <span style="display: none" id="fblg" class="label label-default"><i
                                        class="fa fa-users"></i> Facebook group selected</span>

                            <span style="display: none" id="twl" class="label label-default"><i
                                        class="fa fa-twitter"></i> Twitter selected</span>

                            <span style="display: none" id="wpl" class="label label-default"><i
                                        class="fa fa-wordpress"></i> Wordpress selected</span>

                            <span style="display: none" id="tul" class="label label-default"><i
                                        class="fa fa-tumblr"></i> Tumblr selected</span>
                            </div>
                            <div class="form-group" style="padding-left:10px">

                                <div id="tuBlog" style="display: none">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Your Blogs</legend>

                                        @if($tuMsg == "error")
                                            Can't load your Tublr Blogs
                                        @else
                                            <select class="form-control" id="tuBlogName">
                                                @foreach($tuBlogName as $blog)
                                                    <option id="">{{$blog->name}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group" style="padding-left:10px">


                                <div id="fbPages" style="display: none;" class="form-group">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Your pages list</legend>
                                        <select class="form-control" id="fbPages">
                                            @foreach($fbPages as $fb)
                                                <option id="{{$fb->pageId}}"
                                                        value="{{$fb->pageToken}}">{{$fb->pageName}}</option>
                                            @endforeach
                                        </select>


                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group" style="padding-left:10px">
                                <div id="fbGroupsSection" style="display: none">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Your groups list</legend>

                                        <select class="form-control" id="fbgroups">
                                            @foreach($fbGroups as $fbg)
                                                <option value="{{$fbg->pageId}}">{{$fbg->pageName}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            {{--scheduling start--}}


                            {{--scheduling end--}}

                            <div style="padding-left: 10px" class="form-group">
                                <br>
                                <button id="write" id="write" class="btn btn-success"><i class="fa fa-send"></i>
                                    Post
                                </button>

                                <button id="addschedule" class="btn btn-default"><i class="fa fa-calendar"></i> Add
                                    to
                                    schedule
                                </button>
                            </div>
                            <div id="ss" style="display: none;" class="form-group">
                                <div style="padding-left: 10px">
                                    <select class="form-control" id="type">
                                        <option value="everyMinute">Every Minute</option>
                                        <option value="everyFiveMinutes">Every Five Minutes</option>
                                        <option value="everyTenMinutes">Every Ten Minutes</option>
                                        <option value="everyThirtyMinutes">Every Thirty Minutes</option>
                                        <option value="hourly">Hourly</option>
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="quarterly">Quarterly</option>
                                        <option value="yearly">Yearly</option>

                                    </select>
                                </div>
                                <br>
                                <div style="padding-left: 10px" class="form-group">
                                    <button id="saveschedule" class="btn btn-warning"><i class="fa fa-plus"></i> Add
                                        now
                                    </button>
                                    <button id="sclose" class="btn btn-danger"><i class="fa fa-times"></i> Close
                                    </button>
                                </div>

                            </div>
                            <div style="padding-left: 10px">
                                <div style="display: none;" id="msgBox" class="form-group">
                                    <div class="box box-info">
                                        <div id="returnMsg" class="box-body">
                                            <br>

                                    <span id="fbMsgSu" style="display: none" id="fbl" class="label label-success"><i
                                                class="fa fa-facebook"></i> successfully wrote on facebook Page</span>

                                    <span id="fbgMsgSu" style="display: none" id="fbl" class="label label-success"><i
                                                class="fa fa-facebook"></i> successfully wrote on facebook Group</span>

                                    <span id="twMsgSu" style="display: none" id="twl" class="label label-success"><i
                                                class="fa fa-twitter"></i> successfully wrote on twitter</span>

                                    <span id="wpMsgSu" style="display: none" id="wpl" class="label label-success"><i
                                                class="fa fa-wordpress"></i> successfully wrote on wordpress</span>

                                    <span id="tuMsgSu" style="display: none" id="tul" class="label label-success"><i
                                                class="fa fa-tumblr"></i> successfully wrote on tumblr</span>

                                    <span id="fbMsgEr" style="display: none" id="fbl" class="label label-danger"><i
                                                class="fa fa-facebook"></i> error while trying to writing on facebook page</span>
                                    <span id="fbgMsgEr" style="display: none" id="fbl" class="label label-danger"><i
                                                class="fa fa-facebook"></i> error while trying to writing on facebook group</span>

                                    <span id="twMsgEr" style="display: none" id="twl" class="label label-danger"><i
                                                class="fa fa-twitter"></i> error while trying to writing on twitter</span>

                                    <span id="wpMsgEr" style="display: none" id="wpl" class="label label-danger"><i
                                                class="fa fa-wordpress"></i> error while trying to writing on wordpress</span>

                                    <span id="tuMsgEr" style="display: none" id="tul" class="label label-danger"><i
                                                class="fa fa-tumblr"></i> error while trying to writing on tumblr</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group">
                                    <img src="/img/placeholder.png" width="400" height="450" id="imgPreview">
                                </div>
                            </div>
                            <div class="row">
                                <div class="postPreview">

                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </section>
        </div>

        @include('components.footer')
    </div>
@endsection
@section('css')
    <style>
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width: auto;
            padding: 0 10px;
            border-bottom: none;
        }

    </style>
@endsection
