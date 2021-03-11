@extends('layouts.app')

@section('content')

<div id="about-page" class="block mb-80">
    <div class="hero-image" data-aos="fade-down" data-aos-duration="1000">
        <div class="hero-text">
            <h1 class="page-heading-32" data-aos="fade-up" data-aos-duration="1000">About Us</h1>
        </div>
    </div>
    <div class="container mt-120 pb-80">
        <div class="row">
            <div class="col-sm-6">
                <div class="card mission-card" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card-body bg-light">
                        <div class='iconWrapper-about'>
                            <i class='icon-globe-inv'></i>
                        </div>
                        <h4 class="page-heading-32 mt-0">Mission</h4>
                        <hr>
                        <p>It is the MISSION of St. Rose Academy, Inc. to prepare the individual for well development, uphold the cultural Filipino heritage, live and witness the values of child of God.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card vision-card" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card-body bg-light">
                        <div class="iconWrapper-about text-center">
                            <i class='icon-eye'></i>
                        </div>
                        <h4 class="page-heading-32 mt-0">Vision</h4>
                        <hr>
                        <p>St. Rose Academy, Inc. envisions to produce a transformed human person with well developed moral, personal and spiritual character, discipline, skills, attitudes and values becoming responsive to the changes in society for constructive and effective environment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection