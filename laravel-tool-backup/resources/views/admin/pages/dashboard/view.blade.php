@extends('admin.layouts.main')

@section('main')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Quản lý</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Trang</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->
            <div class="row row-sm">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" id="search">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info btn-block" id="btn_search">Tra cứu</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success btn-block" id="open" data-bs-toggle="modal" data-bs-target="#myModal" type="button">Tạo mới</button>
                </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Row -->
            <div class="row row-sm">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                                    <thead>
                                        <tr>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Position</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>E-mail</th>
                                        <th name="bstable-actions">Actions</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Dominic</td>
                                            <td>Hudson</td>
                                            <td>Sales Assistant</td>
                                            <td>2015/10/16</td>
                                            <td>$654,300</td>
                                            <td>d.hudson@datatables.net</td>
                                            <td name="bstable-actions"><div class="btn-list">
                                        <button id="bEdit" type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" >
                                            <span class="fe fe-edit"> </span>
                                        </button>
                                        <button id="bDel" type="button" class="btn  btn-sm btn-danger">
                                            <span class="fe fe-trash-2"> </span>
                                        </button>
                                    </div></td></tr>
                                                                        </tbody>
                                                                    </table>
                                @include('admin.pages.dashboard.modal')
                            </div>
                        </div>
                    </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
@endsection
@section('jsAdmin')

@endsection

