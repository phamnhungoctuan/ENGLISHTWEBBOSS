@extends('admin.master')
@section('title', 'Sửa bài đăng')
@section('content')

	<form action="" method="POST" enctype="multipart/form-data" class="add-user" >
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<fieldset class="box-add-cate">
			<legend>Sửa bài đăng</legend>
			@include('blocks.errorlogin')
			<div class="form-group">
				<span class="form_label"></span>
				<span class="form_item">
					<a href="{!! url('') !!}/post/<?php echo $dataEdit['url']; ?>.<?php echo $dataEdit['id']; ?>" class="button button2">Xem thử</a>
					<input type="submit" name="btnNewsAdd" value="Cập nhật" class="button button1" />
					@if ($check == 1)
						<a href="{!! url('pt32admin/category') !!}/<?php echo $url.'.post:'.$cateid; ?> " class="button button3">Hủy</a>
					@else
						<a href="{!! url('pt32admin/news') !!}" class="button button3">Hủy</a>
					@endif
				</span></br>
			</div>
			
			<div class="form-group">
				<label style="font-size: 18px;" >Chọn chuyên mục:</label>
				<span class="form_item">
					<select name="sltCate" class="form-control select">
						<?php 
							if (old('sltCate'))
								SelectCateMenu( $dataCate, 0 ,$str="", old('sltCate') ); 
							else 
								SelectCateMenu( $dataCate, 0 ,$str="", $dataEdit['category_id'] );
						?>
					</select> 
				</span><br />
			</div>

			<div class="form-group">
				<label style="font-size: 18px;" >Tiêu đề:</label>
				<span class="form_item">
					<input type="text"  name="txtTitle"  class="form-control" id="pwd" value="<?php if  (old('txtTitle')) echo old('txtTitle'); else echo $dataEdit['title']; ?>" >
				</span><br />
			</div>

			<div class="form-group">
				<label style="font-size: 18px;" >Trích dẫn:</label>
				<span class="form_item">
					<textarea name="txtIntro" rows="5" class="textbox form-control" value=""><?php if (old('txtIntro')) echo old('txtIntro'); else echo $dataEdit['intro']; ?></textarea>
				</span><br />
			</div>

			<div class="form-group">
				<label style="font-size: 18px;" >Nội dung bài đăng:</label> <p>( <i>Giới thiệu về khóa học</i> )</p>
				<span class="form_item">
					<textarea name="txtFull" rows="8" class="textbox" value=""><?php if (old('txtFull')) echo old('txtFull'); else echo $dataEdit['full']; ?></textarea>
					<script type="text/javascript">
						var editor = CKEDITOR.replace('txtFull',{
							language:'vi',
							filebrowserImageBrowseUrl : '../../../../public/pt32_template/js/plugin/ckfinder/ckfinder.html?Type=Images',
							filebrowserFlashBrowseUrl : '../../../../public/pt32_template/js/plugin/ckfinder/ckfinder.html?Type=Flash',
							filebrowserImageUploadUrl : '../../../../public/pt32_template/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							filebrowserFlashUploadUrl : '../../../../public/pt32_template/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
						});
					</script>
				</span><br />
			</div>

			<div class="form-group">
				<a href="{!! url('pt32admin/news/lesson') !!}/{{ $dataEdit["id"] }}" class="button">Quản lí bài học</a>
			</div>

			<div class="form-group">
				<label style="font-size: 18px;" >Ảnh thumbnail:</label></br>
				<span class="form_item">
					<img src="{!! isset($dataEdit["image"]) ? asset('public/uploads/news/'.$dataEdit["image"]) : asset('public/pt32_template/images/nophoto.png') !!}" width="200px" />
					<input type="hidden" name="fImageCurrent" value="{!! $dataEdit["image"] !!}" />
					<input type="file" name="newsImg" class="textbox button button1" value="{!! $dataEdit["image"] !!}"/>
				</span><br />
			</div>

			<div class="form-group">
				<label style="font-size: 18px;" >Có hiển thị bài đăng không ?  </label>
				<span class="form_item">
					<input type="radio" name="rdoPublic" value="1" @if ($dataEdit['status']==1) checked="checked" @endif/> Có 
					<input type="radio" name="rdoPublic" value="0" @if ($dataEdit['status']==0) checked="checked" @endif/> Không
				</span><br />
			</div>

			<span class="form_label"></span>
			<span class="form_item">
				<input type="submit" name="btnNewsAdd" value="Cập nhật" class="button button1" />
				<a href="{!! url('pt32admin/news') !!}" class="button button3">Hủy</a>
			</span>
		</fieldset>
	</form>

@endsection