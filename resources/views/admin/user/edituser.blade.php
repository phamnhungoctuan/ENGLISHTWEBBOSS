@extends('admin.master')
@section('title', 'Thêm thành viên')
@section('content')

<form action="" method="POST" style="">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<fieldset class="box-add-cate">
			<legend>Sửa thành viên</legend>
			@include('blocks.errorlogin')
			@if (session('del-error'))
			<div class="alert alert-danger block-success">
			        <strong>Thật bại! </strong>{{ session('del-error') }}
			    </div>
			@endif
			<div class="form-group">
			  	<label style="font-size: 18px;" for="pwd">Tên thành viên:</label>
			  	<input style="font-size: 18px;" type="text"  name="txtusername"  class="form-control" id="pwd" value="@if(old('txtusername')){!!old('txtusername')!!}@else<?php echo $dataUser["username"];?>@endif" >
			</div>

			<div class="form-group">
			  	<label style="font-size: 18px;" for="pwd">Email:</label>
			  	<input style="font-size: 18px;" type="email"  name="txtemail"  class="form-control" id="pwd" value="@if(old('txtemail')){!!old('email')!!}@else<?php echo $dataUser["email"];?>@endif" >
			</div>

			<div class="form-group">
			  	<label style="font-size: 18px;" for="pwd">Mật khẩu:</label>
			  	<input style="font-size: 18px;" type="text"  name="txtpassword"  class="form-control" id="pwd" value="@if(old('txtpassword')){!! old('txtpassword') !!}@else<?php echo $dataUser["save_pass"];?>@endif">
			</div>

			<span class="form_label"></span>
			<div class="form-group">
			 	<label style="font-size: 18px;" for="pwd">Chức vụ: </label>
			  	<select name="sltUser" class="form-control select">
					<option value="1" @if ($dataUser["level"] == 1) selected @endif>Quản trị viên</option>
					<option value="2" @if ($dataUser["level"] == 2) selected @endif>Mod đăng bài</option>
					<option value="3" @if ($dataUser["level"] == 3) selected @endif>Thành viên</option>
				</select> 
			</div>

			<span class="form_label"></span>
			<span class="form_item">
				<input class="btn btn-primary" type="submit" name="btnCateAdd" value="Sửa thành viên" class="button" />
				<a href='{!! url('pt32admin/user') !!}' class="btn btn-danger">Hủy</a>
		</fieldset>
</form>  
@endsection