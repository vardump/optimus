@extends('layouts.app')
@section('title','Likes and Followers')

@section('content')
    <div class="wrapper" id="followers">
        @include('components.navigation')
        @include('components.sidebar')

        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-4">
                        <!-- USERS LIST -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Twitter Followers</h3>
                                <div class="box-tools pull-right">
                                    <span class="label label-primary">Total {{ $twFolCount }} followers</span>
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix" id="twFolList">
                                    <div id="loading" class="overlay">
                                        Please wait ......
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </ul><!-- /.users-list -->
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="#" class="uppercase">View All Users</a>
                            </div><!-- /.box-footer -->
                        </div><!--/.box -->
                    </div><!-- /.col -->

                    <div class="col-md-4">
                        <!-- USERS LIST -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Facebook</h3>
                                <div class="box-tools pull-right">
                                    <span class="label label-primary">Total 100 followers</span>
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">
                                    <li>
                                        <img src="{{ url('/images/admin-lte/avatar.png') }}" alt="User Image">
                                        <a class="users-list-name" target="_blank"
                                           href="#">Prappo Prince</a>
                                    </li>
                                </ul><!-- /.users-list -->
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="#" class="uppercase">View All Users</a>
                            </div><!-- /.box-footer -->
                        </div><!--/.box -->
                    </div><!-- /.col -->

                    <div class="col-md-4">
                        <!-- USERS LIST -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Facebook</h3>
                                <div class="box-tools pull-right">
                                    <span class="label label-primary">Total 100 followers</span>
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">


                                    <li>
                                        <img src="{{ url('/images/admin-lte/avatar.png') }}" alt="User Image">
                                        <a class="users-list-name" target="_blank" href="#">Prappo Prince</a>
                                    </li>
                                </ul><!-- /.users-list -->
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="#" class="uppercase">View All Users</a>
                            </div><!-- /.box-footer -->
                        </div><!--/.box -->
                    </div><!-- /.col -->
                </div>
            </section>
        </div>
        @include('components.footer')
    </div>
@endsection