@extends('admin.master')
@section('title', 'Quản lí thành viên')
@section('content')
	<h1>Quản lí thành viên:</h1>
	@if (session('del-error'))
			<div class="alert alert-danger block-success">
			        <strong>Thật bại! </strong>{{ session('del-error') }}
			    </div>
			@endif
	@if (session('del-success'))
	    <div class="alert alert-success block-success">
	        <strong>Thành công! </strong> {{ session('del-success') }}
	    </div>
	@endif
	@if (session('add-success'))
	    <div class="alert alert-success block-success">
	        <strong>Thành công!</strong> {{ session('add-success') }}
	    </div>
	@endif
	<div class="head-table-list">
		<p id="name-table-list">Danh sách thành viên: </p>
		<a href="{!! url('pt32admin/user/add') !!}" class="add-cate">Thêm thành viên</a>
	</div>
	
	<div class="table-responsive">
		<table class="list_table table table-bordered">
				<tr class="list_heading">
					<td>STT</td>
					<td>Tên thành viên</td>
					<td>Email</td>
					<td>Chức vụ</td>
					<td>Quản lý?</td>
				</tr>
				<?php ListUser($dataUser); ?>
			</table>
			{!! $dataUser->render() !!}
		</div>

@endsection