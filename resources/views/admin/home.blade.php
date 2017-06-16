@extends('admin.master')
@section('title', 'Quản lí :: Administrator')
@section('content')
    <style>
        a.button1:focus{
            background: #4CAF50 !important;
            text-decoration: none !important;
            color: #ffffff !important;
        }


    </style>
	<h1>Quản lí :: Administrator</h1>
	<div class="container">
	<h4 style="color: red; text-align: center">Chào mừng bạn đến với trang quản trị hệ thống</h4><hr>
		<div class="col-md-12 col-md-offset-2">
			<a class="button button1" href="{!! url('pt32admin/category') !!}">Quản lý chuyên mục</a>
			<a class="button button1" href="{!! url('pt32admin/news') !!}">Quản lý khoá học</a>
			<a class="button button1" href="{!! url('pt32admin/user') !!}">Quản lý thành viên</a>
		</div>
	</div>

@endsection