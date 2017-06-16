@extends('admin.master')
@section('title', 'Quản lí danh mục')
@section('content')
	<h1>Quản lí chuyên mục:</h1>
	@if (session('add-success'))
	    <div class="alert alert-success block-success">
	        <strong>Thành công!</strong> {{ session('add-success') }}
	    </div>
	@endif
	@if (session('del-error'))
			<div class="alert alert-danger block-success">
			        <strong>Thật bại! </strong>{{ session('del-error') }}
			    </div>
			@endif
	<div class="head-table-list">
		<p id="name-table-list">Danh sách chuyên mục: </p>
		<a href="{!! url('pt32admin/category/add') !!}" class="add-cate">Thêm chuyên mục</a>
	</div>
	
	<div class="table-responsive">
		<table class="list_table table table-bordered">
				<tr class="list_heading">
					
					<td>Chuyên Mục</td>
					<td class="action_col">Quản lý?</td>
				</tr>
				<?php ListCate($dataCate); ?>
			</table>
		</div>

@endsection