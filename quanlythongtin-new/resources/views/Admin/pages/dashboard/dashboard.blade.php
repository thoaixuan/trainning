@extends('Admin.layouts.main') 
@section('main')
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Dashboard</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 -->
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="card bg-primary img-card box-primary-shadow">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="text-white">
                                    <h2 class="mb-0 number-font">7,865</h2>
                                    <p class="text-white mb-0">Total Followers </p>
                                </div>
                                <div class="ms-auto"> <i class="fa fa-user-o text-white fs-30 me-2 mt-2"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="card bg-secondary img-card box-secondary-shadow">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="text-white">
                                    <h2 class="mb-0 number-font">86,964</h2>
                                    <p class="text-white mb-0">Total Likes</p>
                                </div>
                                <div class="ms-auto"> <i class="fa fa-heart-o text-white fs-30 me-2 mt-2"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="card  bg-success img-card box-success-shadow">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="text-white">
                                    <h2 class="mb-0 number-font">98</h2>
                                    <p class="text-white mb-0">Total Comments</p>
                                </div>
                                <div class="ms-auto"> <i class="fa fa-comment-o text-white fs-30 me-2 mt-2"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="card bg-info img-card box-info-shadow">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="text-white">
                                    <h2 class="mb-0 number-font">893</h2>
                                    <p class="text-white mb-0">Total Posts</p>
                                </div>
                                <div class="ms-auto"> <i class="fa fa-envelope-o text-white fs-30 me-2 mt-2"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
            </div>
            <!-- ROW-1 END -->
<!-- Row -->
{{-- <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Công việc đang thực hiện</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">First name</th>
                                <th class="wd-15p border-bottom-0">Last name</th>
                                <th class="wd-20p border-bottom-0">Position</th>
                                <th class="wd-15p border-bottom-0">Start date</th>
                                <th class="wd-10p border-bottom-0">Salary</th>
                                <th class="wd-25p border-bottom-0">E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bella</td>
                                <td>Chloe</td>
                                <td>System Developer</td>
                                <td>2018/03/12</td>
                                <td>$654,765</td>
                                <td>b.Chloe@datatables.net</td>
                            </tr>
                            <tr>
                                <td>Donna</td>
                                <td>Bond</td>
                                <td>Account Manager</td>
                                <td>2012/02/21</td>
                                <td>$543,654</td>
                                <td>d.bond@datatables.net</td>
                            </tr>
                            <tr>
                                <td>Harry</td>
                                <td>Carr</td>
                                <td>Technical Manager</td>
                                <td>20011/02/87</td>
                                <td>$86,000</td>
                                <td>h.carr@datatables.net</td>
                            </tr>
                            <tr>
                                <td>Lucas</td>
                                <td>Dyer</td>
                                <td>Javascript Developer</td>
                                <td>2014/08/23</td>
                                <td>$456,123</td>
                                <td>l.dyer@datatables.net</td>
                            </tr>
                            <tr>
                                <td>Karen</td>
                                <td>Hill</td>
                                <td>Sales Manager</td>
                                <td>2010/7/14</td>
                                <td>$432,230</td>
                                <td>k.hill@datatables.net</td>
                            </tr>
                            <tr>
                                <td>Dominic</td>
                                <td>Hudson</td>
                                <td>Sales Assistant</td>
                                <td>2015/10/16</td>
                                <td>$654,300</td>
                                <td>d.hudson@datatables.net</td>
                            </tr>
                            <tr>
                                <td>Herrod</td>
                                <td>Chandler</td>
                                <td>Integration Specialist</td>
                                <td>2012/08/06</td>
                                <td>$137,500</td>
                                <td>h.chandler@datatables.net</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- End Row -->
        </div>
        <!-- CONTAINER END -->
    </div>
</div>
<!--app-content close-->
@endsection