@extends('layouts.app')

@section('content')

<div class="container mt-30 pb-30" id="show-announcement">
<div class="row justify-content-center">
  <div class="col-sm-10" id="show-post">
    <div class="post-card">
        <h2 class="heading-24 text-center" data-aos="fade-down" data-aos-duration="1000"><span class="text-uppercase text-primary">{{ $announcement->type }}: </span>{{ $announcement->title }}</h2>
        <hr class="mb-0">
            <small class="text-muted mt-0">Created at {{date("F j, Y h:i:sa", strtotime($announcement->created_at))}}</small>
            <img src="/announcements/{{ $announcement->image_cover }}" alt="{{ $announcement->title }}" data-aos="fade-up" data-aos-duration="1000">
        <hr>
         <ul class="list-unstyled show-socials">
            <li><div class="iconWrapper-show"><i class="icon-facebook"></i></div></li>
            <li><div class="iconWrapper-show"><i class="icon-twitter"></i></div></li>
            <li><div class="iconWrapper-show"><i class="icon-youtube-play"></i></div></li>
        </ul>
        <hr>
        
            @if($announcement->start_date)
            <i class="icon-calendar mr-2"></i> 
            <span class="date">
                DATE:
                    @if($announcement->start_date)
                        {{date("F j, Y", strtotime($announcement->start_date))}}
                    @endif
                    @if($announcement->end_date)
                        -
                        {{date("F j, Y", strtotime($announcement->end_date))}}
                    @endif
            @endif
            </span>
        <p class="my-4 show-p" data-aos="fade-up" data-aos-duration="1000">{{ $announcement->content }}</p>
    </div>
  </div>
  {{-- <div class="rightcolumn">
    <div class="post-card">
      <h2 class="heading-16 font-weight-bolder text-center">More Announcements</h2>
        @foreach($other_announcements as $oa)
            <hr>
            <a href="/notices/{{ $oa->id }}" class="text-dark">
                <p class="tiny-text py-3"><span class="text-uppercase ml-3">{{ $oa->type }}: </span>{{ $oa->title }}</p>
            </a>
            <hr>
        @endforeach
    </div>
  </div> --}}
</div>
<div class="row mt-30 ">
        <div class="col">
            <div class="card-group">
                @foreach($other_announcements as $oa)
                    <div class="col-md-4">   
                        <div class="card announce-card" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="card-image">
                                <img class="card-img-top" src="/announcements/{{ $oa->image_cover }}" alt="Card image cap">
                                <div class="text-block">
                                    <span class="label success">{{ $oa->type }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="/notices/{{ $oa->id }}" class="text-dark">
                                    <h5 class="card-title">{{ $oa->title }}</h5>
                                </a>
                                <hr>
                                @if($oa->start_date != null)
                                    <p class="mb-2"><span class="details p-label start-date mr-1">Start</span> {{date("F j, Y", strtotime($oa->start_date))}}</p>
                                    <p><span class="details p-label end-date mr-1">End</span> {{date("F j, Y", strtotime($oa->end_date))}}</p>
                                @endif
                                    <p class="card-text">
                                                {{ substr($oa->content, 0, 100)."..." }}
                                    </p>

                                <a href="/notices/{{ $oa->id }}" class="read_more">Read More <i class="icon-angle-double-right"></i></a>
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

@endsection