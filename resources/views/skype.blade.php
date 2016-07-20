@extends('layouts.app')
@section('title','Skype')
@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')

        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-5">
                        <!-- USERS LIST -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-skype"></i> Skype contacts</h3>

                                <div class="box-tools pull-right">

                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">
                                    @foreach($contacts as $contact)
                                    <li>
                                        <img src="@if(isset($contact['avatar_url'])){{$contact['avatar_url']}}@else/img/logopadding.png @endif" alt="User Image">
                                        <a class="users-list-name" href="/skype/user/{{$contact['id']}}">{{$contact['display_name']}}</a>
                                        <span class="users-list-date">{{$contact['id']}}</span>
                                    </li>

                                        @endforeach


                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.box-body -->

                            <!-- /.box-footer -->
                        </div>
                        <!--/.box -->
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-yellow">
                                <div class="widget-user-image">
                                    <img class="img-circle" src="{{$profile['avatarUrl']}}" alt="User Avatar">
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username">{{$profile['firstname']}} {{$profile['lastname']}}</h3>
                                <h5 class="widget-user-desc">{{$profile['mood']}}</h5>
                            </div>
                            <div class="box-footer no-padding">
                                <ul class="nav nav-stacked">
                                    <li><a href="#">Language <span class="pull-right badge bg-blue">{{$profile['language']}}</span></a></li>
                                    <li><a href="#">Country <span class="pull-right badge bg-aqua">{{$profile['country']}}</span></a></li>
                                    <li><a href="#">Email <span class="pull-right badge bg-green">{{$profile['emails'][0]}}</span></a></li>
                                    <li><a href="#">User name <span class="pull-right badge bg-red">{{$profile['username']}}</span></a></li>
                                </ul>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="box box-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-info">
                                    <div class="widget-user-image">
                                        <img class="img-circle"
                                             src="/img/logopadding.png"
                                             alt="User Avatar">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">Mass sender</h3>
                                    <h5 class="widget-user-desc">Send message to your all skype contacts</h5>
                                </div>
                                <div class="box-footer no-padding">
                                    <ul class="nav nav-stacked">
                                        <li>

                                            <div style="padding: 10px" class="form-group">
                                                <textarea class="form-control" id="message" rows="3"></textarea>


                                                <button class="btn btn-default" id="sendMsg"><i class="fa fa-send"></i> Send
                                                    Message
                                                </button>

                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection