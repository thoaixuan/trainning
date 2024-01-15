@extends('layouts.main')
@section('main')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title my-auto">Xin chào</h1>
    <div>
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="javascript:void(0)">My Folder</a>
          </li>
        <li class="breadcrumb-item active" aria-current="page"></li>
      </ol>
    </div>
  </div>
  <!-- PAGE-HEADER END -->
  <div class="row">
    <div class="col-md-12 mb-3">
        <div id="tacvu" wfd-invisible="true">
            <button class="btn btn-success button-edit" data-url="">Download</button>
            <button class="btn btn-danger button-delete ms-2">Xóa</button>
        </div>
    </div>
    <div class="col-xl-12">
        <ul class="listFileCloud row row-cols-2 row-cols-md-4 g-4 ps-0" id="listFileChild">
        </ul>
    </div>
</div>
@endsection
@section('js')
    <script> var idChild = "{{$id}}";</script>
    <script src="https://unpkg.com/megajs@1/dist/main.browser-umd.js"></script>
    <script type="module" src="{{asset('app/main.js')}}"></script>
    <script type="module" src="{{ asset('app/folder/getfile.js') }}"></script>
    {{-- <script type="module" src="{{ asset('app/folder/folderchild.js') }}"></script> --}}
@endsection
