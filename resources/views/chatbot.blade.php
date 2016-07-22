@extends('layouts.app')
@section('title','Chat Bot')
@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')
        <div id="chatbot"></div>
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Chat Bot</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <input type="text" class="form-control" id="question" placeholder="Question">
                                </div>
                                <div class="form-group">
                                    <label for="answer">Answer</label>
                                    <input type="text" class="form-control" id="answer" placeholder="Your answer ..">
                                </div>


                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button id="addData" class="btn btn-primary">Add now</button>
                            </div>

                        </div>
                        <!-- /.box -->

                        {{--table start form here--}}

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Available questions and answers</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($data as $d)
                                        <tr>

                                            <td>{{$d->id}}</td>
                                            <td>{{$d->question}}</td>

                                            <td>{{$d->answer}}</td>
                                            <td><a class="chatbotdel" data-id="{{$d->id}}" href="#"><span
                                                            class="badge bg-red"><i
                                                                class="fa fa-times"></i> Delete</span></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->

                        </div>


                    </div>
                    <div class="col-md-6" align="center">
                        <img height="250" width="250" src="/img/optmessenger.png">
                        <h3>Optimus Prime Facebook chat bot</h3>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('css')
    <script src="opt/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="opt/sweetalert.css">
@endsection
