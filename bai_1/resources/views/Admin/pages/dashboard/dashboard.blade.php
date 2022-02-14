@extends('Admin.admin')

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

@include('Admin.compoment.modal');
</div>
@endsection

@push('scripts')
<script src="{{asset('app/admin/home/index.js')}}?v={{time()}}"></script>
<script>
    var user=new user();
    user.datas={
        routes:{
            datatable:"{{route('admin.datatable.dashboard')}}",
            insert:"{{route('admin.insert.dashboard')}}",
            updates:"{{route('admin.update.dashboard')}}",
            updates_data:"{{route('admin.update_data.dashboard')}}",
            delete:"{{route('admin.delete.dashboard')}}",
        }
    }
    user.init();
</script>
@endpush