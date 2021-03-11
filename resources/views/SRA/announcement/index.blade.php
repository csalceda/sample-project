@extends('layouts.app')

@section('content')

<div id="announcements" class="block mb-80">
    <div class="a-image" data-aos="fade-down" data-aos-duration="1000">
        <div class="a-text">
            <h1 class="page-heading-24" data-aos="fade-up" data-aos-duration="1000">Announcements & Events</h1>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row">
            <div class="col">
                <h5 class="page-heading-32 text-center pt-3 pb-4">
                    Announcements & Events
                </h5>
            </div>
        </div>
    </div> --}}
    
    @if($count > 1 )
    <div class="container" style="background-color: #ffffff;">
        {{-- <h5 class="heading-20"> Contact Us </h5> --}}
        <div class="row">
            <div class="col-sm-6 left-divide" data-aos="fade-up" data-aos-duration="1000">
                <div class="row">
                    <div class="col">
                        <div class="tag">{{ $highlight->type }}</div>
                        <p class="heading-24 text-center mt-3">{{ $highlight->title }}</p>
                        <hr>
                        <p class="text-center details">
                            @if($highlight->start_date)
                            <i class="icon-calendar mr-2"></i>
                                {{date("F j, Y", strtotime($highlight->start_date))}}
                            @endif
                        </p>
                        <div class="col">
                            <p class="highlight-p">
                                {{ substr($highlight->content, 0, 300)."..." }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row  bottom-left">
                    <div class="col">
                        <a href="/notices/{{ $highlight->id }}" class="btn btn-info">View More</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 right-divide mt-5" data-aos="fade-up" data-aos-duration="1000">
                <img src="/announcements/{{ $highlight->image_cover }}" alt="{{ $highlight->title }}">
            </div>
        </div>
    </div>

    <div class="container pt-50 pb-50">
    <div class="row">
        <div class="col">
            <span class="heading-20 d-header"><i class="icon-bullhorn mr-2"></i>More Announcements </span>
            {{-- <a href="/notices" class="float-right text-dark">View More <i class="icon-angle-double-right"></i></a> --}}
            <hr class="divide">
            {{-- <h5 class="page-heading-20 pb-4"><i class="icon-bullhorn mr-2"></i>More Announcements</h5> --}}
        </div>
    </div>
    <div class="row mt-30">
        <div class="col">
            <div class="card-group">
                @foreach($announcements as $announcement)
                    <div class="col-md-4">   
                        <div class="card announce-card" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="card-image">
                                <img class="card-img-top" src="/announcements/{{ $announcement->image_cover }}" alt="Card image cap">
                                <div class="text-block">
                                    <span class="label success">{{ $announcement->type }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="/notices/{{ $announcement->id }}" class="text-dark">
                                    <h5 class="card-title">{{ $announcement->title }}</h5>
                                </a>
                                <hr>
                                @if($announcement->start_date != null)
                                    <p class="mb-2"><span class="details p-label start-date mr-1">Start</span> {{date("F j, Y", strtotime($announcement->start_date))}}</p>
                                    <p><span class="details p-label end-date mr-1">End</span> {{date("F j, Y", strtotime($announcement->end_date))}}</p>
                                @endif
                                    <p class="card-text">
                                                {{ substr($announcement->content, 0, 100)."..." }}
                                    </p>

                                <a href="/notices/{{ $announcement->id }}" class="read_more">Read More <i class="icon-angle-double-right"></i></a>
                            </div>
                            {{-- <div class="card-footer">
                            <small class="text-muted">Created at {{date("F j, Y h:i:sa", strtotime($announcement->created_at))}}</small>
                            </div> --}}
                        </div>
                    </div>
                    @endforeach
            </div>       
        </div>
    </div>
    </div>
    @elseif($count == 1)
        <div class="container" style="background-color: #ffffff;">
        <div class="container-footer"></div>
        {{-- <h5 class="heading-20"> Contact Us </h5> --}}
        <div class="row">
            <div class="col-sm-6 left-divide" data-aos="fade-up" data-aos-duration="1000">
                <div class="row">
                    <div class="col">
                        <div class="tag">{{ $highlight->type }}</div>
                        <p class="heading-24 text-center">{{ $highlight->title }}</p>
                        <hr>
                        <p class="text-center details">
                            @if($highlight->start_date)
                            <i class="icon-calendar mr-2"></i>
                                {{date("F j, Y", strtotime($highlight->start_date))}}
                            @endif
                        </p>
                        <div class="col">
                            <p class="highlight-p">
                                {{ substr($highlight->content, 0, 300)."..." }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row float-right bottom-right">
                    <div class="col">
                        <a href="/notices/{{ $highlight->id }}" class="btn btn-info">View More</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 right-divide" data-aos="fade-up" data-aos-duration="1000">
                <img src="/announcements/{{ $highlight->image_cover }}" alt="{{ $highlight->title }}">
            </div>
        </div>
        <div class="container-footer"></div>
    </div>
    @else
        <div class="container" style="background-color: #ffffff;">
            <div class="row">
                <div class="col">
                    <h5 class="heading-20 text-center p-5"> No Announcements Yet </h5>
                </div>
            </div>
        </div>
    @endif
    
</div>


@endsection