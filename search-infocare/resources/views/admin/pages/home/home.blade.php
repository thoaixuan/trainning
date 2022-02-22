@extends('admin.main')
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Tổng Quan</h1>
			</div>
			<!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('dashboard')}}/">Tổng Quan</a>
					</li>{{--
					<li class="breadcrumb-item active">Dashboard v1</li>--}}</ol>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-4 ">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h5 id="countCustomers">{{1}}</h5>
							<p>Thành Viên</p>
						</div>
						<div class="icon"> <i class="fa fa-users" aria-hidden="true"></i>
						</div>
						<a href="" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-sm-12 col-md-6 col-lg-4 ">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h5 class="countPublished">{{2}}</h5> 
							<p>Dự án còn thời hạn</p>
						</div>
						<div class="icon"> <i class="fa fa-money" aria-hidden="true"></i>
						</div>
						<a href="" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				
				<div class="col-sm-12 col-md-6 col-lg-4 ">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h5 class="countPending">{{3}}</h5>
							<p>Dự án hết hạn</p>
						</div>
						<div class="icon"><i class="fas fa-area-chart"></i>
						</div>
						<a href="" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				
				<!-- ./col -->
			</div>
		
		
	</div>
</div>
@endsection