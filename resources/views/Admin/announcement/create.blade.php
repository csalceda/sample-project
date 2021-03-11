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
                                <li class="breadcrumb-item"><a href="/admin-announcement">Announcements</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create Announcements</li>
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
                                    <h5 class="heading-20">Create New Announcement</h5>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <form action="{{ route('admin-announcement.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="Announcement">Announcement</option>
                                    <option value="Event">Event</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <p class="label mb-0"> Title </p>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>

                            <div class="col">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Choose Image Cover</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image_cover" id="image_cover">
                                        <label class="custom-file-label" for="image_cover">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row float-right">
                            <div class="col">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="javascript:history.back()" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Go Back</a>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection