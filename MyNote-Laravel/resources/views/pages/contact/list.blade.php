@extends('layouts.main')
@section('main')
<h4>Contact list</h4>

  <div class="row row-sm mb-3">
      <div class="col-md-4 mb-2">
          <input type="text" class="form-control" id="search">
      </div>
      <div class="col-md-2 mb-2">
          <button class="btn btn-primary w-100" id="formSearch">Search</button>
      </div>
  </div>

<div class="table-responsive">
    <table class="table table-bordered border-5 border-secondary ">
      </table>
    </div>
@endsection
@section('js')
  <script src="{{ asset('/app/main.js') }}"></script>
  <script src="{{asset('/app/contact/contact.js') }}"></script>
 
@endsection