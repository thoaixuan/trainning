@extends('layouts.master')

@section('content')
<div class="container">
<div>
<button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#userModal">Thêm mới</button>
<div class="row">
    <div class="col-8">
        <input class="form-control" id="search"  name="search" vale="" placeholder="Từ khóa tìm kiếm ....">
    </div>
</div>

</div>  

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