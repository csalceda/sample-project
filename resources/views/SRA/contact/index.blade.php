@extends('layouts.app')

@section('content')

<div id="contact" class="block mb-80">
    <div class="c-image" data-aos="fade-down" data-aos-duration="1000">
        <div class="c-text">
            <h1 class="page-heading-20" data-aos="fade-up" data-aos-duration="1000">Contact Us</h1>
        </div>
    </div>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="container" style="background-color: #ffffff;">
        <div class="row">
            <div class="col-sm-6 left-divide" data-aos="fade-left" data-aos-duration="1000">
                <div class="row">
                    <div class="col">
                        <p class="heading-24 text-center">St. Rose Academy Inc.</p>
                        <hr>
                        <p class="heading-16 px-4 text-center">
                            <i class="icon-location"></i>8D Pres. Magsaysay, LHS, Pasig, 1609 Metro Manila
                        </p>
                        <div class="col contact-button m">
                            <a href="tel:6566181" class="btn btn-outline-primary justify-content-center btn-block mt-4"><i class="icon-phone mr-2"></i>(02) 656-61-81</a>
                            <a href="tel:09065208491" class="btn btn-outline-primary justify-content-center btn-block mt-4"><i class="icon-mobile mr-2"></i>09065208491</a>
                            <a href="mailto:stroseacad@yahoo.com" class="btn btn-outline-primary justify-content-center btn-block mt-4"><i class="icon-mail mr-2"></i>stroseacad@yahoo.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 right-divide" data-aos="fade-right" data-aos-duration="1000">
                <form action="{{ route('contact.store') }}" method="POST">
                {{ csrf_field() }}
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">

                    <label for="email" class="mt-3">E-Mail</label>
                    <input type="email" class="form-control" name="contact_email" id="email" placeholder="E-mail">

                    <label for="message" class="mt-3">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Message"></textarea>

                    <div class="row float-right mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

@endsection