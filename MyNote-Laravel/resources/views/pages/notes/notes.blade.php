@extends('layouts.main')
@section('main')
<h4>Note list</h4>

  <div class="row row-sm mb-3">
      <div class="col-md-4 mb-2">
          <input type="text" class="form-control" id="search">
      </div>
      <div class="col-md-2 mb-2">
          <button class="btn btn-primary w-100" id="formSearch">Search</button>
      </div>
      <div class="col-md-2 mb-2">
        <button id="new" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary w-100" type="submit">New</button>
     </div >
  </div>

<div class="table-responsive">
    <table class="table table-bordered border-5 border-secondary ">
      </table>
    </div>
@endsection
@section('modal')
  @include('pages.notes.modal')
@endsection
@section('js')
  <script src="{{asset('/app/notes/notes.js') }}"></script>
  <script src="{{asset('app/main.js')}}"></script>
  <script>
      CKEDITOR.replace('description');
  </script>
@endsection