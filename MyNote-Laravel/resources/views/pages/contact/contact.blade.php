@extends('layouts.main')
@section('main')
    <div class="container w-75">
        <form action="" class="">
            <div class="row mt-5">
                <div class="col-md-6 mb-3">
                    <label for="fullname">Full Name</label>
                    <input id="fullname" type="text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="email">Phone Number</label>
                <input id="email" type="number" class="form-control">
            </div>
            <div class="mb-3">
                <label for="detail">Detail</label>
                <textarea id="detail" name="detail" type="text"></textarea>
            </div>
            <div id="captcha" class="mt-3 g-recaptcha {{ env('CAPTCHA_STATUS') == true ? '' : 'd-none' }}" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
            <div class="mb-3 text-center">
                <input id="submit" type="submit" class="form-control btn btn-primary w-50">
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('detail');
    </script>
@endsection