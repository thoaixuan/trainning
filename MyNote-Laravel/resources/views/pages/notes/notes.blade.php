@extends('layouts.main')
@section('main')
<h4>Note list</h4>

<form class="search mb-3 " role="search">
  <div class="row me-1 ms-0">
      <button id="new" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-primary mb-2 col-xl-2 col-lg-2 col-md-2 col-sm-2" type="submit">New</button>
  </div>
</form>

<div class="table-responsive">
    <table class="table table-bordered border-5 border-secondary ">
      </table>
    </div>
@endsection
@section('js')
  <script src="{{asset('/app/notes/notes.js') }}"></script>
  <script src="{{asset('app/main1.js')}}"></script>
  <script>
      CKEDITOR.replace('description');
  </script>
@endsection