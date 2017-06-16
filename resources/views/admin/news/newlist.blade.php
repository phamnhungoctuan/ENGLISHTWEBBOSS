@extends('admin.master')
@section('title', 'Quản lí bài viết')
@section('content')
	<h1>Quản lí các khóa học:</h1>
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
		<p id="name-table-list">Danh sách bài viết: </p>
		<a href="{!! url('pt32admin/news/add') !!}" class="add-cate">Đăng bài viết mới</a>
	</div>
	
	<div class="table-responsive">
		<table class="list_table table table-bordered">
				<tr class="list_heading">
					<td>STT</td>
					<td>Tên bài viết</td>
					<td>Chuyên mục</td>
					<td>Ngày đăng</td>
					<td>Trạng thái</td>
					<td>Quản lý?</td>
				</tr>
				<?php $stt = 0; ?>
				@foreach($news as $item )
				<?php $stt++ ?>
				<?php $category = getNameCate($item['category_id']); ?>
					<td class="list_td alignleft">{!! $stt !!}</td>
		                <td class="list_td alignleft"><a href="{!! route('getEditNews',['id'=>$item["id"], 'check' => '0']) !!}">{!! $item['title'] !!}</a></td>
		                <td class="list_td alignleft"><a href="{!! asset("pt32admin/category") !!}/<?php echo $category['slug'].'.post:'.$category['id']; ?>" >{!! $category['name'] !!}</a></td>
		                <td class="list_td alignleft"><?php \Carbon\Carbon::setLocale('vi'); ?> {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() !!} </td>

		                <td class="list_td alignleft"><?php if($item['status']==1) echo "Hiện"; else echo "Ẩn"; ?></td>
		                <td class="list_td aligncenter">
		                    <a href="{!! route('getEditNews',['id'=>$item["id"], 'check' => '0']) !!}"><img width="30" height="30" src="{!! asset("public/pt32_template/images/edit.png") !!}" /></a>
		                    <a href="{!! route('getDeleteNews',['id'=>$item["id"]]) !!}" onclick="return accept_del('Bạn có chắc muốn xóa bài viết này không?')"><img width="30" height="30" src="{!! asset("public/pt32_template/images/delete.png") !!}" /></a>
		                </td>
		            </tr>
		        @endforeach
			</table>
			{!! $news->render() !!}
		</div>

@endsection