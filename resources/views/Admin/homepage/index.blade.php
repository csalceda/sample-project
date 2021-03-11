@extends('layouts.admin_layout')

@section('content')

<div id="annoncement_list" class="block mt-30 mb-80">
    <div class="container">
        <div class="row">
            <div class="col">
                <h5 class="heading-32">Dashboard</h5>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                    <div class="card-columns align-items-center admin_home">
                        <div class="card justify-content-center ">
                            <div class="card-body text-center">
                                <p><i class="icon-users admin-icon"></i></p>
                                <a href="/admin-students" class="text-dark">
                                    <p class="card-text heading-24">Students List</p>
                                </a>
                            </div>
                        </div>
                        <div class="card justify-content-center ">
                            <div class="card-body text-center">
                                <p><i class="icon-money admin-icon"></i></p>
                                <a href="/admin-tuition" class="text-dark">
                                    <p class="card-text heading-24">Tuition Fee</p>
                                </a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body text-center">
                                <p><i class="icon-bullhorn admin-icon"></i></p>
                                <a href="/admin-announcement" class="text-dark">
                                    <p class="card-text heading-24">Announcements</p>
                                </a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body text-center">
                                <p><i class="icon-mail admin-icon"></i></p>
                                <a href="/admin-contact" class="text-dark">
                                    <p class="card-text heading-24">Messages</p>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection