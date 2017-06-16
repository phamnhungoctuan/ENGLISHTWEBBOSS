@extends('page.master')
@section('title', 'Đăng nhập')
@section('content')
<div class="body-login">
@if (session('add-success'))
      <div class="alert alert-success block-success">
          <strong>Thành công!</strong> {{ session('add-success') }}
      </div>
  @endif
		<div class="box-login">
			<h1 id="title">Đăng nhập</h1>

			@if (session('error_login'))
			    <div class="alert alert-danger">
			        {{ session('error_login') }}
			    </div>
			@endif


			@include('blocks.errorlogin')
			<form class="form-horizontal" method="POST" action="">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			  <div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			    <input id="email" type="email" class="form-control" name="txtEmail" placeholder="Nhập Email" value="@if(session('email')){{ session('email') }}@endif">
			  </div>
			  <div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			    <input id="password" type="password" class="form-control" name="txtPass" placeholder="Nhập mật khẩu" value="@if (session('email')){{ session('password') }}@endif">
			  </div>
			  
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <div class="checkbox">
			        <label><input type="checkbox"> Lưu đăng nhập</label>
			      </div>
			    </div>
			  </div>
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">Đăng nhập</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
	@endsection