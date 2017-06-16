@extends('admin.master')
@section('title', 'Sửa câu hỏi')
@section('content')

<h1>Sửa câu hỏi</h1>
@include('blocks.errorlogin')
<form method="POST" enctype="multipart/form-data" action="">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label style="font-size: 18px;" for="txt">Nhập câu hỏi: </label>
		<input type="text" name="txtQuestion" class="form-control" id="txt" placeholder="Nhập câu hỏi tại đây" value="{{ $datatask->question }}">
	</div>
	<div class="form-group">
		<label style="font-size: 18px;" for="txt">Chọn loại nội dung gợi ý? </label>
		<select name="slTypeTask" id="slTypeTask" class="form-control select small-sl">
			<option value="0" @if($datatask->type == 0) selected="selected" @endif>Không chọn loại nội dung</option>
			<option value="1" @if($datatask->type == 1) selected="selected" @endif>Đoạn văn</option>
			<option value="2" @if($datatask->type == 2) selected="selected" @endif>Tranh</option>
			<option value="3" @if($datatask->type == 3) selected="selected" @endif>Video</option>
			<option value="4" @if($datatask->type == 4) selected="selected" @endif>Audio</option>
		</select>
		<span onclick="showType()" style="cursor: pointer;" class="button btn-select">Chọn</span>
		<span class="form_item" id="spantxt" @if($datatask->type == 1) style="display: block;" @else style="display: none;" @endif>
			<textarea id="txtText" style="display: none;" name="txtText" rows="8" class="textbox" value=""><?php if($datatask->type == 1) echo $datatask->content; ?></textarea>
			<script type="text/javascript">
				var editor = CKEDITOR.replace('txtText',{
					language:'vi',
					filebrowserImageBrowseUrl : '../../../../../../../public/pt32_template/js/plugin/ckfinder/ckfinder.html?Type=Images',
					filebrowserFlashBrowseUrl : '../../../../../../../public/pt32_template/js/plugin/ckfinder/ckfinder.html?Type=Flash',
					filebrowserImageUploadUrl : '../../../../../../../public/pt32_template/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
					filebrowserFlashUploadUrl : '../../../../../../../public/pt32_template/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				});
			</script>
		</span>
		<div class="form-group" id="taskImg" @if($datatask->type == 2) style="display: block;" @else style="display: none;" @endif>
			<label style="font-size: 18px;" >Ảnh thumbnail:</label></br>
			<span class="form_item">
				<img src="{!! $datatask->type == 2 ? asset('public/uploads/news/'.$datatask->content) : asset('public/pt32_template/images/nophoto.png') !!}" width="200px" />
				<input type="hidden" name="fImageCurrent" value="{{ $datatask->content }}" />
				<input type="file" name="taskImg" class="textbox button button1" @if($datatask->type == 2) value="{{ $datatask->content }}" @endif/>
			</span><br />
		</div>
		<input type="text" id="txtUrl" class="form-control" name="txtUrl" @if($datatask->type == 3) style="display: inline-block;" @else style="display: none;" @endif  @if($datatask->type == 3) value="{{ $datatask->content }}" @endif/>
		<input type="text" id="txtAudio" class="form-control" name="txtAudio" @if($datatask->type == 4) style="display: inline-block;" @else style="display: none;" @endif @if($datatask->type == 4) value="{{ $datatask->content }}" @endif/>
	</div>
	<div class="form-group f-answer">
    	<label class="control-label col-sm-2" for="txt">Đáp án A: </label>
	    <div class="col-sm-10">
	     	<input type="text" class="form-control" id="txtA" name="txtA" value="{{ $datatask->A }}">
	    </div>
	</div>
	<div class="form-group f-answer">
    	<label class="control-label col-sm-2" for="txt">Đáp án B: </label>
	    <div class="col-sm-10">
	     	<input type="text" class="form-control" id="txtB" name="txtB" value="{{ $datatask->B }}">
	    </div>
	</div>
	<div class="form-group f-answer">
    	<label class="control-label col-sm-2" for="txt">Đáp án C: </label>
	    <div class="col-sm-10">
	     	<input type="text" class="form-control" id="txtC" name="txtC" value="{{ $datatask->C }}">
	    </div>
	</div>
	<div class="form-group f-answer">
    	<label class="control-label col-sm-2" for="txt">Đáp án D: </label>
	    <div class="col-sm-10">
	     	<input type="text" class="form-control" id="txtD" name="txtD" value="{{ $datatask->D }}">
	    </div>
	</div>
	<div class="form-group f-answer">
    	<label class="control-label col-sm-2" for="txt">Đáp án đúng là: </label>
	    <div class="col-sm-10">
	     	<select name="slAnswer" id="slAnswer" class="form-control">
				<option value="A" @if($datatask->answer == "A") selected="selected" @endif>A</option>
				<option value="B" @if($datatask->answer == "B") selected="selected" @endif>B</option>
				<option value="C" @if($datatask->answer == "C") selected="selected" @endif>C</option>
				<option value="D" @if($datatask->answer == "D") selected="selected" @endif>D</option>
			</select>
	    </div>
	</div>
	<input type="submit" name="btnTaskAdd" class="button" value="Sửa">
	<a href="{!! route('getEditLesson', ['id' => $id, 'idls' => $idls]) !!}" title="Huy" class="button button3">Hủy</a>
</form>
<script type="text/javascript">
	function showType() {
		var element = document.getElementById("slTypeTask");
		var value = element.options[element.selectedIndex].value;
		if (value == 0) {
			document.getElementById("spantxt").style.display = "none";
			document.getElementById("txtText").style.display = "none";
			document.getElementById("cke_txtText").style.display = "none";
			document.getElementById("taskImg").style.display = "none";
			document.getElementById("txtUrl").style.display = "none";
			document.getElementById("txtAudio").style.display = "none";
		}
		if (value == 1) {
			document.getElementById("spantxt").style.display = "block";
			document.getElementById("cke_txtText").style.display = "inline-block";
			document.getElementById("taskImg").style.display = "none";
			document.getElementById("txtUrl").style.display = "none";
			document.getElementById("txtAudio").style.display = "none";
		}
		if (value == 2) {
			document.getElementById("spantxt").style.display = "none";
			document.getElementById("txtText").style.display = "none";
			document.getElementById("cke_txtText").style.display = "none";
			document.getElementById("taskImg").style.display = "block";
			document.getElementById("txtUrl").style.display = "none";
			document.getElementById("txtAudio").style.display = "none";
		}
		if (value == 3) {
			document.getElementById("spantxt").style.display = "none";
			document.getElementById("txtText").style.display = "none";
			document.getElementById("cke_txtText").style.display = "none";
			document.getElementById("taskImg").style.display = "none";
			document.getElementById("txtUrl").style.display = "inline-block";
			document.getElementById("txtAudio").style.display = "none";
		}
		if (value == 4) {
			document.getElementById("spantxt").style.display = "none";
			document.getElementById("txtText").style.display = "none";
			document.getElementById("cke_txtText").style.display = "none";
			document.getElementById("taskImg").style.display = "none";
			document.getElementById("txtUrl").style.display = "none";
			document.getElementById("txtAudio").style.display = "inline-block";
		}
	}
</script>
@endsection