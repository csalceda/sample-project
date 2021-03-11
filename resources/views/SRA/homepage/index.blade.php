@extends('layouts.app')

@section('content')

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-aos="fade-down" data-aos-duration="1000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('/sra/pic1.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('/sra/pic2.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('/sra/pic3.jpg') }}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    {{-- <div class="hero-image">
        <div class="hero-text">
            <h2>Student Registration For S.Y. 2020-2021 Open Now</h2>
            <a href="/register" class="btn btn-primary mt-3">GO HERE</a>
        </div>
    </div> --}}

    @include('SRA.homepage.inc.register_block')
    @include('SRA.homepage.inc.announcement')
    @include('SRA.homepage.inc.about')
    @include('SRA.homepage.inc.gallery')
    <div id="map"></div>

@endsection