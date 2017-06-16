@extends('admin.master')
@section('title', 'Thêm thành viên')
@section('content')

<form action="" method="POST" style="">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<fieldset class="box-add-cate">
			<legend>Thêm thành viên</legend>
			@include('blocks.errorlogin')

			<div class="form-group">
			  	<label style="font-size: 18px;" for="pwd">Tên thành viên mới:</label>
			  	<input style="font-size: 18px;" type="text"  name="txtusername"  class="form-control" id="pwd" value="{!! old('txtusername') !!}" >
			</div>

			<div class="form-group">
			  	<label style="font-size: 18px;" for="pwd">Email:</label>
			  	<input style="font-size: 18px;" type="email"  name="txtemail"  class="form-control" id="pwd" value="{!! old('txtemail') !!}" >
			</div>

			<div class="form-group">
			  	<label style="font-size: 18px;" for="pwd">Mật khẩu:</label>
			  	<input style="font-size: 18px;" type="password"  name="txtpassword"  class="form-control" id="pwd" value="" >
			</div>

			<div class="form-group">
			  	<label style="font-size: 18px;" for="pwd">Xác nhận mật khẩu:</label>
			  	<input style="font-size: 18px;" type="password"  name="txtpassword_confirmation"  class="form-control" id="pwd" value="" >
			</div>

			<span class="form_label"></span>
			<div class="form-group">
			 	<label style="font-size: 18px;" for="pwd">Chức vụ: </label>
			  	<select name="sltUser" class="form-control select">
					<option value="1">Quản trị viên</option>
					<option value="2">Cộng tác viên</option>
					<option value="3" selected >Thành viên</option>
				</select> 
			</div>

			<span class="form_label"></span>
			<span class="form_item">
				<input class="btn btn-primary" type="submit" name="btnCateAdd" value="Thêm thành viên" class="button" />
				<a href='javascript:goback()' class="btn btn-danger">Hủy</a>
		</fieldset>
</form>  
@endsection