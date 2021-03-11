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

                        {{-- Announcements --}}
                        
                        <div class="row">
                            <div class="col">
                                <h3 class="heading-20 font-weight-bold">{{ $announcement->title }}</h3>
                                <form action="{{ route('admin-announcement.delete', ['admin_announcement' => $announcement->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                <hr>
                                <img class="card-img-top" src="/announcements/{{ $announcement->image_cover }}" alt="Card image cap">

                                <p class="font-weight-bold mb-0 mt-3"><span>Start Date: {{date("F j, Y", strtotime($announcement->start_date))}}</span></p>
                                <p class="font-weight-bold mt-0"> <span>End Date: {{date("F j, Y", strtotime($announcement->end_date))}}</span></p>
                                <hr>    

                                <p>{{ $announcement->content }}</p>
                            </div>
                        </div>

                        <div class="row float-right">
                            <div class="col">
                                <a href="/admin-announcement/{{ $announcement->id }}/edit" class="btn btn-warning">Edit</a>
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