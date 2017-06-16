@extends('admin.master')
@section('title', 'Quản lí khóa học')
@section('content')
	<?php $news = getNameNews($id); ?>
	<h1>Khóa học: {!! $news["title"] !!}</h1>
	<br>
	@if (session('del-error'))
			<div class="alert alert-danger block-success">
			        <strong>Thật bại! </strong>{{ session('del-error') }}
			    </div>
			@endif
	@if (session('del-success'))CA
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
		<p id="name-table-list">Danh sách bài học có trong khóa học: </p>
		<a href="{{ route('getEditNews', ['id' => $id, 'check' => '0']) }}" class="add-cate">Trở về quản lí khóa học</a>
		<a href="{!! url('pt32admin/news/lesson/') !!}/{{ $id }}/add" class="add-cate">Thêm bài học</a>
	</div>
	
	<div class="table-responsive">
		<table class="list_table table table-bordered">
				<tr class="list_heading">

					<td>Tên bài học</td>

					<td>Quản lý?</td>
				</tr>
				<?php ListLesson($dataLesson, $id); ?>
			</table>
		</div>
@endsection