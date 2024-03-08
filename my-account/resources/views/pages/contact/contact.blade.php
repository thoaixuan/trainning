@extends('layouts.main')
@section('main')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title my-auto">Liên hệ</h1>
        <div>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row contact">
        <div class="card custom-card">
            <div class="card-header">
                <i class="las la-user-plus"></i>
                <div class="card-title">
                    Thông tin liên hệ
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3 mt-0" id="form-contact">
                    @csrf
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email <span>*</span></label>
                        <input type="email" name="email"  class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Số điện thoại <span>*</span></label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" aria-label="phone">
                    </div>
                    <div class="col-12">
                        <label for="titleContact" class="form-label">Tiêu đề <span>*</span></label>
                        <input type="tect" name="title"  class="form-control" id="title" placeholder="Tiêu đề">
                    </div>
                    <div class="col-12">
                        <label for="editor" class="form-label">Nội dung</label>
                        <textarea type="text" name ="description" class="form-control" id="description"></textarea>
                    </div>
                    <div class="col-12">
                        <button id="btnSendContact" type="submit" class="btn btn-primary" data-url="" data-id="">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('app/main.js') }}"></script>
    <script src="{{ asset('app/contact/contact.js') }}"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    {{-- <script src="{{url('themes/assets/libs/quill/quill.min.js')}}"></script>
    <script src="{{url('themes/assets/js/quill-editor.js')}}"></script> --}}
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
