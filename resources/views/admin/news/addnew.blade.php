@extends('admin.master')
@section('title', 'Đăng bài viết mới')
@section('content')

	<form action="" method="POST" enctype="multipart/form-data" class="add-user" >
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<fieldset class="box-add-cate">
			<legend>Đăng bài viết mới</legend>
			@include('blocks.errorlogin')
			<div class="form-group">
				<label style="font-size: 18px;" >Chọn chuyên mục:</label>
				<span class="form_item">
					<select name="sltCate" class="form-control select">
					<?php SelectCateMenu( $dataCate, 0 ,$str="", old('sltCate') ); ?>
						
					</select> 
				</span><br />
			</div>

			<div class="form-group">
				<label style="font-size: 18px;" >Tiêu đề:</label>
				<span class="form_item">
					<input type="text"  name="txtTitle"  class="form-control" id="pwd" value="{!! old('txtTitle') !!}" >
				</span><br />
			</div>

			<div class="form-group">
				<label style="font-size: 18px;" >Trích dẫn:</label>
				<span class="form_item">
					<textarea name="txtIntro" rows="5" class="textbox form-control" value="">{!! old('txtIntro') !!}</textarea>
					
				</span><br />
			</div>

			<div class="form-group">
				<label style="font-size: 18px;" >Nội dung bài đăng:</label><p>( <i>Giới thiệu về khóa học</i> )</p>
				<span class="form_item">
					<textarea name="txtFull" rows="8" class="textbox" value="">{!! old('txtFull') !!}</textarea>
					<script type="text/javascript">
						var editor = CKEDITOR.replace('txtFull',{
							language:'vi',
							filebrowserImageBrowseUrl : '../../public/pt32_template/js/plugin/ckfinder/ckfinder.html?Type=Images',
							filebrowserFlashBrowseUrl : '../../public/pt32_template/js/plugin/ckfinder/ckfinder.html?Type=Flash',
							filebrowserImageUploadUrl : '../../public/pt32_template/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							filebrowserFlashUploadUrl : '../../public/pt32_template/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
						});
					</script>
				</span><br />
			</div>

			<div class="form-group">
				<label style="font-size: 18px;" >Ảnh thumbnail:</label>
				<span class="form_item">
					<input type="file" name="newsImg" class="textbox button button1" />
				</span><br />
			</div>
			


			<div class="form-group">
				<label style="font-size: 18px;" >Có hiển thị bài đăng không ?  </label>
				<span class="form_item">
					<input type="radio" name="rdoPublic" value="1" checked="checked" /> Có 
					<input type="radio" name="rdoPublic" value="0" /> Không
				</span><br />
			</div>


			<a href="{!! url('pt32admin/news') !!}" class="button">Đăng khóa học để có thể thêm bài học</a>
			<span class="form_label"></span>
			<span class="form_item">
				<input type="submit" name="btnNewsAdd" value="Đăng bài viết" class="button button1" />
				<a href="{!! url('pt32admin/news') !!}" class="button button3">Hủy</a>
			</span>
		</fieldset>
	</form>

@endsection