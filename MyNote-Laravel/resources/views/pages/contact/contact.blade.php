@extends('layouts.main')
@section('main')
    <div class="container w-75">
        <form id="contactForm" onsubmit="return false">
            @csrf
            <div class="row mt-5">
                <div class="form-group col-md-6 mb-3">
                    <label for="fullname">Full Name</label>
                    <input id="name" name = "name" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="email">Phone Number</label>
                <input id="phone" type="number" name = "phone" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="detail">Message</label>
                <textarea id="message" name="message" type="text"></textarea>
            </div>
            
            <div class="g-recaptcha d-flex justify-content-center mb-3" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>       
           
            <div class="mb-3 text-center">
                <input type="submit" class="form-control btn btn-primary w-25">
                
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="{{ asset('/theme/assets/plugins/recaptcha/api.js') }}" async defer></script>
    <script src="{{ asset('/app/main.js') }}"></script>
    <script src="{{ asset('/app/contact/contact.js') }}"></script>
    <script>
        CKEDITOR.replace('message');
    </script>
@endsection