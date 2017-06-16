@extends('admin.master')
@section('title')
	Chuyên mục {!! $namecate !!}
@endsection
@section('content')
	<h1>Chuyên mục: {!! $namecate !!}</h1>
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
		<p id="name-table-list">Danh sách bài viết: </p>
		<a href="{!! url('pt32admin/news/add') !!}" class="add-cate">Đăng bài viết mới</a>
		<a href="{!! url('pt32admin/category') !!}" class="add-cate">Về quản lí chuyên mục</a>
	</div>
	
	<div class="table-responsive">
		<table class="list_table table table-bordered">
				<tr class="list_heading">
					<td>STT</td>
					<td>Tên bài viết</td>
					<td>Chuyên mục</td>
					<td>Người đăng</td>
					<td>Ngày đăng</td>
					<td>Trạng thái</td>
					<td>Quản lý?</td>
				</tr>
				<?php $stt = 0; ?>
				@foreach($news as $item )
				<?php $stt++ ?>
				<?php $check = "cate"; ?>
				<?php $category = getNameCate($item['category_id']); ?>
					<td class="list_td alignleft">{!! $stt !!}</td>
		                <td class="list_td alignleft"><a href="{!! route('getEditNews',['id'=>$item["id"], 'check'=> '1']) !!}">{!! $item['title'] !!}</a></td>
		                <td class="list_td alignleft">{!! $category['name'] !!}</td>
		                <td class="list_td alignleft">{{ Auth::User()->username }}</td>
		                <td class="list_td alignleft"><?php \Carbon\Carbon::setLocale('vi'); ?> {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() !!} </td>

		                <td class="list_td alignleft"><?php if($item['status']==1) echo "Hiện"; else echo "Ẩn"; ?></td>
		                <td class="list_td aligncenter">
		                    <a href="{!! route('getEditNews',['id'=>$item["id"], 'check'=> '1']) !!}"><img width="30" height="30" src="{!! asset("public/pt32_template/images/edit.png") !!}" /></a>
		                    <a href="{!! route('getDeleteNews',['id'=>$item["id"]]) !!}" onclick="return accept_del('Bạn có chắc muốn xóa bài viết này không?')"><img width="30" height="30" src="{!! asset("public/pt32_template/images/delete.png") !!}" /></a>
		                </td>
		            </tr>
		        @endforeach
			</table>
		</div>

@endsection