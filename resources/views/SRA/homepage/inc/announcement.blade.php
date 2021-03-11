<div class="container-fluid announce-fluid">
@if(count($announcements) > 0)
    <div class="container pt-80 pb-80" id="announcement-block" data-aos="fade-up" data-aos-duration="1000">
        <div class="announcement_bg"></div>
        <span class="heading-24 d-header"><i class="icon-bullhorn mr-2"></i> Announcements </span>
        {{-- <a href="/notices" class="float-right text-dark">View More <i class="icon-angle-double-right"></i></a> --}}
        <hr class="divide">

        <div class="row mt-5 pb-30">
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
    @endif
</div>