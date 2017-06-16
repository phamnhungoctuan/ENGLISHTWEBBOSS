@extends('admin.master')
@section('title', 'Thêm bài học')
@section('content')

<form action="" method="POST" style="">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<fieldset class="box-add-cate">
			<legend>Thêm Bài học</legend>
			@include('blocks.errorlogin')
			<div class="form-group">
			  	<label style="font-size: 18px;" for="sel">Chọn danh mục cha:</label>
			  	<select name="sltLesson" class="form-control select">
					<option value="0">Không có danh mục cha</option>
					<?php SelectLessonMenu( $dataLesson, 0 ,$str="", old('sltLesson') );
					 ?>
				</select> 
			</div>
			<div class="form-group">
			  <label style="font-size: 18px;" for="pwd">Tên bài học mới:</label>
			  <input type="text"  name="txtLessonName"  class="form-control" id="pwd" value="{!! old('txtLessonName') !!}" >
			</div>
			<div class="form-group">
			  <label style="font-size: 18px;" for="pwd">Link video bài học:</label>
			  <input type="text"  name="txtUrlVideo"  class="form-control" id="pwd" value="{!! old('txtUrlVideo') !!}" >
			</div>
			
			<input class="button" type="submit" name="btnCateAdd" value="Đăng bài học để thêm nội dung trắc nghiệm" class="button" />
			<span class="form_label"></span>
			<span class="form_item">
				<input class="button" type="submit" name="btnCateAdd" value="Thêm bài học" class="button" />
				<a href='{!! url('pt32admin/news/lesson') !!}/{{ $id }}' class="button button3">Hủy</a>
		</fieldset>
</form>
@endsection