@extends('layouts.admin_layout')

@section('content')

<div id="messages" class="block mt-20 mb-80">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="student_display" class="block mb-80">
                    <div class="container">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Messages</li>
                            </ol>
                        </nav>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="container">
                                    <h5 class="heading-20">Message</h5>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <div class="container">
                                <h5 class="heading-16"><span class="font-weight-bold">From: </span> {{ $message->name }} <small>(<a href="mailto:{{$message->email}}">{{ $message->email }}</a>)</small></h5>
                                    <p>{{date("F j, Y h:i:sa", strtotime($message->created_at))}}</p>

                                    <hr>
                                    <p>{{ $message->message }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row float-right mt-5">
                            <div class="col">
                                <a href="mailto:{{$message->email}}" class="btn btn-success">Reply</a>
                                <a href="javascript:history.back()" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Go Back</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection