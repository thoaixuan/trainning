@extends('guest.layouts.main')
@section('main')
<div class="bg-landing bg-white pt-3 pb-3">
    <div class="container ">
        <div class="row mt-9 mb-3">
            <div class="col-md-5 col-sm-12 d-flex align-items-center">
                <img src="/uploads/support.webp" width="100%"/>
            </div>
            <div class="col-md-7 col-sm-12 text-dark bg-body shadow-lg">
            <div class="card-body p-3">
                <div class="statistics-info p-4">
                                <form  id="support_form" class="row">
                                    <h2 class="fw-bold">Thông tin hỗ trợ</h2>
                                    <div class="form-group col-md-6">
                                        <label for="name">Tên</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email <span class="span-required">(không bắt buộc nhập)</span></label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="phone">Phòng ban</label>
                                        <select class="form-select" aria-label="Default select example" name="rooms_id" id="rooms_id">
                                                @foreach(fetchDepartment() as $list_department)
                                                <option value="{{$list_department->id}}">{{$list_department->title}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Nội dung</label>
                                        <textarea class="form-control" name="content" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary col-lg-2 col-md-2 col-sm-2">Gửi ngay</button>
                                    </div>
                                </form>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('jsGuest')
<script src="{{asset('app/Guest/support/support.js')}}"></script>
<script>
  var support=new support();
      support.datas={
        routes:{
          insert:"{{route('guest.support.send_support')}}", 
        }
      }
      support.init();
</script>
@endsection