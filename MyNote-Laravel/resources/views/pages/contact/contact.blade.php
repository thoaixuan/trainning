@extends('layouts.main')
@section('main')
    <div class="container w-75">
        <form id="contactForm" >
            @csrf
            <div class="row mt-5">
                <div class="col-md-6 mb-3">
                    <label for="fullname">Full Name</label>
                    <input name = "name" type="text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="email">Phone Number</label>
                <input type="number" name = "phone" class="form-control">
            </div>
            <div class="mb-3">
                <label for="detail">Detail</label>
                <textarea id="detail" name="detail" type="text"></textarea>
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
        CKEDITOR.replace('detail');
    </script>
@endsection