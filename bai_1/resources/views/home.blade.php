@extends('layouts.master')

@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">Thêm mới</button>
            </li>
          </ul>
        </div>
    </nav> 
<table class="table table-stripped mt-4" id="users-table"></table>

@include('compoment.modal');
</div>
@endsection

@push('scripts')
<script src="{{asset('app/admin/home/index.js')}}"></script>
<script>
    var user=new user();
    user.datas={
        routes:{
            datatable:"{{route('user.datatable')}}",
            insert:"{{route('user.insert')}}",
            updates:"{{route('user.update')}}",
            updates_data:"{{route('user.update.data')}}",
            delete:"{{route('user.delete')}}",
        }
    }
    user.init();
</script>
@endpush