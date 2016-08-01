@extends('layouts.app')
@section('title','Wordpress')
@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')
        <div id="wppage"></div>
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="{{url('/images/optimus/social/wp.png')}}"
                                     alt="User profile picture">
                                <h3 class="profile-username text-center">{{\App\Http\Controllers\Data::get('wpUrl')}}</h3>


                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Total Posts</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <strong> {{\App\Wp::all()->count()}}</strong>

                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                                {{--<li><a href="#write" data-toggle="tab">Write</a></li>--}}

                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    @foreach($data as $d)
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">{{$d->title}}</h3>

                                            <div class="timeline-body">
                                                {!! $d->content !!}
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs">Read more</a>
                                                <a class="btn btn-danger btn-xs">Delete</a>
                                            </div>
                                        </div>
                                @endforeach
                                <!-- /.post -->

                                    <!-- Post -->


                                </div><!-- /.tab-pane -->
                                <div class="tab-pane" id="write">
                                    <input type="hidden" id="postId">
                                    <div class="form-group">
                                        <input placeholder="Title" class="form-control" type="text" id="dataTitle">
                                        <textarea class="form-control" rows="4" id="status"
                                                  placeholder="Type here ..."></textarea><br>
                                        <button class="btn btn-primary" id="wpwrite">Post now</button>
                                    </div>
                                </div><!-- /.tab-pane -->


                            </div><!-- /.tab-content -->
                        </div><!-- /.nav-tabs-custom -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section>
        </div>

        @include('components.footer')
    </div>
@endsection

@section('css')
    <script src="opt/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="opt/sweetalert.css">
@endsection

