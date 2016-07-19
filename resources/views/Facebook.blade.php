@extends('layouts.app')
@section('title','Facebook')
@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')

        <div class="content-wrapper">
            <section class="content">

                <div class="row">
                    <div class="col-md-4">


                        <!-- page summary start-->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Facebook Pages</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                                class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">
                                    @foreach($data['accounts']['data'] as $pageNo => $pageData)
                                        <li>
                                            <img src="{{$pageData['picture']['data']['url'] }}" alt="User Image">
                                            <a class="users-list-name" target="_blank"
                                               href="http://facebook.com/{{$pageData['id']}}">{{$pageData['name']}}</a>
                                            <span class="users-list-date">{{$pageData['fan_count']}}</span>
                                        </li>

                                    @endforeach

                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.box-body -->

                            <!-- /.box-footer -->
                        </div>
                        <!-- page summary end -->

                        <!-- group summary start -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Facebook Groups</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                                class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="display: block;">
                                <ul class="products-list product-list-in-box">
                                    <!-- listing groups start -->
                                    @foreach($fbGroups['data'] as $groupNo=>$group)
                                        <li class="item">
                                            <div class="product-img">
                                                <img src="{{$group['picture']['data']['url']}}" alt="Product Image">
                                            </div>
                                            <div class="product-info">
                                                <a href="javascript:void(0)" class="product-title">{{$group['name']}}
                                                    <span class="label label-warning pull-right">{{$group['privacy']}}
                                                        group</span></a>
                        <span class="product-description">
                          Owner : <a href="http://facebook.com/{{$group['owner']['id']}}"
                                     target="_blank"> {{$group['owner']['name']}}</a>
                        </span>
                                            </div>
                                        </li>
                                @endforeach
                                <!--list group end -->
                                    <!-- /.item -->

                                    <!-- /.item -->
                                </ul>
                            </div>
                            <!-- /.box-body -->

                            <!-- /.box-footer -->
                        </div>

                        <!-- group summary end -->


                    </div><!-- /.col -->

                    <div class="col-md-8">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#write" data-toggle="tab"><i
                                                class="fa fa-pencil-square"></i> Write</a></li>
                                {{--fetching page names --}}
                                @foreach($data['accounts']['data'] as $pageNo => $pageData)
                                    <li><a href="#{{ $pageData['id'] }}" data-toggle="tab">{{ $pageData['name'] }}</a>
                                    </li>
                                @endforeach


                            </ul>
                            <div class="tab-content">
                                {{--loop for tabs according to facebook pages--}}
                                @foreach($data['accounts']['data'] as $pageNo => $pageData)
                                    <div class="tab-pane" id="{{ $pageData['id'] }}">
                                        <!-- Post -->
                                        {{--loop for feeds of pages--}}
                                        @foreach($pageData['feed']['data'] as $contentNo => $content)
                                            @if(isset($content['id']))
                                                <div class="post">
                                                    <div class="user-block">
                                                        <img class="img-circle img-bordered-sm"
                                                             src="{{ $content['from']['picture']['data']['url'] }}"
                                                             alt="user image">
                                    <span class='username'>
                                      <a target="_blank"
                                         href="http://facebook.com/{{$content['from']['id']}}">{{ $content['from']['name'] }}</a>


                                        <div class="optimusfbcom" data-id="{{$content['id']}}"
                                             data-token="{{$pageData['access_token']}}"><a
                                                    class='pull-right btn-box-tool'><i
                                                        class='fa fa-times'></i></a></div>
                                        <div class="optimusfbedit"
                                             data-value="@if(isset($content['message'])){{$content['message']}}@else No feed found @endif"
                                             data-id="{{$content['id']}}"
                                             data-token="{{$pageData['access_token']}}"><a
                                                    class='pull-right btn-box-tool'><i class='fa fa-edit'></i></a></div>
                                    </span>
                                                        <span class='description'><a
                                                                    href="http://facebook.com/{{$content['id']}}"
                                                                    target="_blank"> {{\App\Http\Controllers\Op::date($content['created_time'])}}</a></span>
                                                    </div><!-- /.user-block -->
                                                    <p>
                                                        <!-- feed section start -->

                                                        @if(isset($content['message']))
                                                            {{$content['message']}}
                                                        @else
                                                            No feed found
                                                    @endif

                                                    <!-- feed section end -->

                                                    </p>
                                                    {{--reactions start--}}
                                                    <a href="@if(isset($content['link']))
                                                    {{ $content['link']}}
                                                    @else
                                                            #
                                                            @endif
                                                            " target="_blank">Link</a><br>

                                                    {{--{{ print_r($content['link']) }}--}}

                                                    @if(isset($content['reactions']))
                                                        <?php $likes = 0;$love = 0;$haha = 0;$wow = 0;$sad = 0;$angry = 0;$totalReactions = 0; ?>
                                                        @foreach($content['reactions']['data'] as $reactionNo=>$reactions)
                                                            {{--{{ $reactions['type'] }}--}}
                                                            @if($reactions['type']=='LIKE')
                                                                <?php $likes++;$totalReactions++;?>
                                                            @elseif($reactions['type']=='LOVE')
                                                                <?php $love++;$totalReactions++;?>
                                                            @elseif($reactions['type']=='SAD')
                                                                <?php $sad++;$totalReactions++;?>
                                                            @elseif($reactions['type']=='HAHA')
                                                                <?php $haha++;$totalReactions++;?>
                                                            @elseif($reactions['type']=='WOW')
                                                                <?php $wow++;$totalReactions++;?>
                                                            @elseif($reactions['type']=='ANGRY')
                                                                <?php $angry++;$totalReactions++;?>
                                                            @endif

                                                        @endforeach

                                                    @endif
                                                    <div style="padding-left: 10px" class="row">
                                                        {{--@if($likes > 0)--}}
                                                        <img src="img/likesmall.gif">{{$likes}}
                                                        {{--@elseif($love>0)--}}
                                                        <img src="img/lovesmall.gif">{{$love}}
                                                        {{--@elseif($haha>0)--}}
                                                        <img src="img/hahasmall.gif">{{$haha}}
                                                        {{--@elseif($wow>0)--}}
                                                        <img src="img/wowsmall.gif">{{$wow}}
                                                        {{--@elseif($sad>0)--}}
                                                        <img src="img/sadsmall.gif">{{$sad}}
                                                        {{--@elseif($angry>0)--}}
                                                        <img src="img/angrysmall.gif">{{ $angry }}

                                                        {{--@endif--}}

                                                    </div>


                                                    </p>
                                                    {{--count comments and likes--}}
                                                    <?php $countComments = 0;?>
                                                    @if(isset($content['comments']))
                                                        @foreach($content['comments']['data'] as $commentNo => $comments)
                                                            <?php $countComments++;?>

                                                        @endforeach
                                                    @endif
                                                    <span class="pull-right text-muted">{{$totalReactions}}
                                                        Reactions - {{ $countComments }} comments</span><br><br>
                                                    <?php $countComments = 0; ?>
                                                    <?php $likes = 0;$love = 0;$haha = 0;$wow = 0;$sad = 0;$angry = 0;$totalReactions = 0; ?>

                                                    {{--reactions end--}}

                                                    {{--comments start--}}
                                                    @if(isset($content['comments']))
                                                        @foreach($content['comments']['data'] as $comNo => $com)
                                                            @if(isset($com['message']))
                                                                <div style="padding-left: 20px" class="post">
                                                                    <div class="user-block">
                                                                        <img class="img-circle img-bordered-sm"
                                                                             src="{{$com['from']['picture']['data']['url']}}"
                                                                             alt="user image">
                                                        <span class='username'>
                                                          <a target="_blank"
                                                             href="http://facebook.com/{{$com['from']['id']}}">{{$com['from']['name']}}</a>
                                                          <div class="optimusfbcom" data-id="{{$com['id']}}"
                                                               data-token="{{$pageData['access_token']}}"><a
                                                                      class='pull-right btn-box-tool'><i
                                                                          class='fa fa-times'></i></a></div>
                                                        </span>
                                                                        <span class='description'><a
                                                                                    href="http://facebook.com/{{$com['id']}}"
                                                                                    target="_blank"> {{\App\Http\Controllers\Op::date($com['created_time'])}}</a></span>
                                                                    </div><!-- /.user-block -->
                                                                    <p>
                                                                        {{$com['message']}}

                                                                    </p>
                                                                    {{--subcomments start--}}
                                                                    @if(isset($com['comments']))
                                                                        @foreach($com['comments']['data'] as $subComNo => $subCom)
                                                                            <div style="padding-left: 30px;"
                                                                                 class="post">
                                                                                <div class="user-block">

                                                                                    <img class="img-circle img-bordered-sm"
                                                                                         src="img/me.png"
                                                                                         alt="user image">
                                                                        <span class='username'>
                                                                          <a target="_blank"
                                                                             href="http://facebook.com/{{$subCom['id']}}">{{$subCom['from']['name']}}</a>
                                                                          <div class="optimusfbcom"
                                                                               data-id="{{$subCom['id']}}"
                                                                               data-token="{{$pageData['access_token']}}"><a
                                                                                      class='pull-right btn-box-tool'><i
                                                                                          class='fa fa-times'></i></a></div>
                                                                        </span>
                                                                                    <span class='description'><a
                                                                                                href="http://facebook.com/{{$subCom['id']}}"
                                                                                                target="_blank">{{\App\Http\Controllers\Op::date($subCom['created_time'])}}</a> </span>
                                                                                </div><!-- /.user-block -->
                                                                                <p>
                                                                                    {{$subCom['message']}}
                                                                                </p>


                                                                            </div>


                                                                        @endforeach

                                                                    @endif

                                                                    {{--replay box start--}}
                                                                    <div style="padding-left: 20px"
                                                                         class="form-horizontal">
                                                                        <div class="form-group margin-bottom-none">
                                                                            <div class="col-sm-10">
                                                                                <input class="form-control input-sm"
                                                                                       data-id="{{$com['id']}}"
                                                                                       data-token="{{$pageData['access_token']}}"
                                                                                       placeholder="Replay.. ">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <br>

                                                                    {{--replay box end--}}

                                                                    {{--subcomments end--}}

                                                                </div><!-- /.post -->
                                                            @endif
                                                        @endforeach
                                                    @endif


                                                    {{--commnets end--}}

                                                    {{-- comment box here--}}

                                                    <div class="form-horizontal">
                                                        <div class="form-group margin-bottom-none">
                                                            <div class="col-sm-12">
                                                                <input class="form-control input-sm"
                                                                       data-id="{{$content['id']}}"
                                                                       data-token="{{$pageData['access_token']}}"
                                                                       placeholder="Comment">
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div><!-- /.post -->

                                                <!-- Post -->
                                            @endif
                                        @endforeach


                                    </div><!-- /.tab-pane -->
                                @endforeach
                                <div class="active tab-pane" id="write">
                                    <div class="form-group">
                                        <input type="text" placeholder="Title" id="dataTitle" class="form-control">
                                        <input type="text" placeholder="Caption" id="caption" class="form-control">
                                        <input type="text" placeholder="Link" id="Link" class="form-control">

                                        <input type="text" placeholder="Description" id="description"
                                               class="form-control">
                                        <form id="uploadimage" method="post" enctype="multipart/form-data">
                                            <label>Select Your Image</label><br/>
                                            <input type="file" name="file" id="file"/>
                                            <input type="submit" value="Upload" id="imgUploadBtn"/>
                                            <input type="hidden" id="image">
                                            <div id="imgMsg"></div>
                                        </form>

                                        <input type="checkbox" id="imagetype"> Image Post
                                <textarea class="form-control" rows="4" id="status"
                                          placeholder="Type here ..."></textarea><br>
                                        <div id="fbPages" class="form-group">
                                            <select id="fbPages">
                                                @foreach($fbPages as $fb)
                                                    <option id="{{$fb->pageId}}"
                                                            value="{{$fb->pageToken}}">{{$fb->pageName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn btn-primary" id="fbwrite">Post now</button>
                                    </div>
                                </div><!-- /.tab-pane -->


                            </div><!-- /.tab-content -->
                        </div><!-- /.nav-tabs-custom -->
                    </div><!-- /.col -->
                </div><!-- /.row -->

            </section><!-- /.content -->

        </div>
        @include('components.footer')
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {

        });
    </script>
@endsection

@section('css')
    <script src="opt/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="opt/sweetalert.css">
@endsection