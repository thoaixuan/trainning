@extends('guest.layouts.main')
@section('main')
<div class="bg-landing bg-white pt-3 pb-3">
    <div class="container">
        <div class="row mt-9 mb-3">
        <h1>
        {!! $pages->name !!}
        </h1>
        {!! $pages->content !!}
        </div>
    </div>
</div>
<style>

</style>
@endsection
@section('jsGuest')
@endsection