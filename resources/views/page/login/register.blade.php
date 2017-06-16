@extends("page.master")

@section('title')
Đăng ký
@endsection

@section('content')
<div class="body-login">
	@include('blocks.errorlogin')
	<div class="box-login">
		<h1 id="title">Đăng kí</h1>
		<form method="POST" action="" id="form-register">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label for="email">Họ và tên:</label>
				<input type="text" name="txtusername" id="username" placeholder="Nhập tên người dùng" class="form-control" value="{!! old('txtusername') !!}" />
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="txtemail" id="email" placeholder="Email" class="form-control" value="{!! old('txtemail') !!}"/>
			</div>
			<div class="form-group">
				<label for="email">Mật khẩu:</label>
				<input type="password" name="txtpassword" id="password" placeholder="Password" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="email">Nhập lại mật khẩu:</label>
				<input type="password" name="txtpassword_confirmation" id="password_confirmation" placeholder="Re-password" class="form-control"/>
			</div>
			<button class="btn btn-lg btn-info btn-block" type="submit">Đăng kí</button>
		</form>
	</div>
</div>
<script type="text/javascript">
</script>
@endsection