@extends('layouts.admin_layout')

@section('content')

    {{-- Announcement Page --}}
<div id="annoncement_list" class="block mt-20 mb-80">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="announcement_display" class="block mb-80">
                    <div class="container">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Announcements</li>
                            </ol>
                        </nav>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                            <div class="row">
                                <div class="col-sm-10 col-12">
                                    <h5 class="heading-20">Announcements</h5>
                                </div>
                                <div class="col-sm-2 col-12">
                                    <a href="/admin-announcement/create" class="btn btn-primary pull-right">Add<i class="icon-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <hr>

                        {{-- Announcements --}}
                        <div class="card-group mt-30 mb-30">
                            @foreach($announcements as $announcement)
                            <div class="col-md-4">   
                                <div class="card">
                                    <img class="card-img-top" src="/announcements/{{ $announcement->image_cover }}" alt="Card image cap">
                                    <div class="card-body">
                                        <a href="/admin-announcement/{{$announcement->id}}">
                                            <h5 class="card-title">{{ $announcement->title }}</h5>
                                        </a>
                                        <hr>
                                        <p class="mb-0"><span class="details">Start Date:</span> {{date("F j, Y", strtotime($announcement->start_date))}}</p>
                                        <p><span class="details">End Date:</span> {{date("F j, Y", strtotime($announcement->end_date))}}</p>
                                        <p class="card-text">
                                            {{ substr($announcement->content, 0, 200)."..." }}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                    <small class="text-muted">Created at {{date("F j, Y h:i:sa", strtotime($announcement->created_at))}}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection