@extends('admin.master')
@section('title', 'Sửa bài học')
@section('content')

<form action="{{ action('PostController@postEditLesson', ['id' => $id, 'idls' => $idls]) }}" method="POST" style="">
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
	@include('blocks.errorlogin')
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<fieldset class="box-add-cate">
			<legend>Sửa Bài học</legend>
			<div class="form-group">
			  	<label style="font-size: 18px;" for="sel">Chọn danh mục cha:</label>
			  	<select name="sltLesson" class="form-control select">
					<option value="0">Không có danh mục cha</option>
					<?php SelectLessonMenu( $dataLesson, 0 ,$str="", $lesson['parent_id'] );
					 ?>
				</select> 
			</div>
			<div class="form-group">
			  <label style="font-size: 18px;" for="pwd">Tên bài học:</label>
			  <input type="text"  name="txtLessonName"  class="form-control" id="pwd" value="@if(old('txtLessonName')){!!olc('txtLessonName')!!}@else<?php echo $lesson["name"];?>@endif">
			</div>
			<div class="form-group">
			  <label style="font-size: 18px;" for="pwd">Link video bài học:</label>
			  <input type="text"  name="txtUrlVideo"  class="form-control" id="pwd" value="@if(old('txtUrlVideo')){!!olc('txtUrlVideo')!!}@else<?php echo $lesson["intro_video"];?>@endif" >
			</div>
			<span class="form_label"></span>
			<div class="form-group">
			  <label style="font-size: 18px;" for="pwd">Danh sách câu hỏi:</label><br>
			  <span class="button" style="cursor: pointer; margin-bottom: 10px;" onclick="showAdd()">Thêm câu hỏi</span>
			  <div class="table-responsive">
				<table class="list_table table table-bordered">
					<tr class="list_heading">
						<td>STT</td>
						<td>Câu hỏi</td>
						<td>Đáp án</td>
						<td>Quản lý?</td>
					</tr>
					<tr>
					<?php $stt = 0; ?>
					@foreach($datatask as $item )
					<?php $stt++ ?>
						<td class="list_td alignleft">{!! $stt !!}</td>
		                <td class="list_td alignleft"><a href="{!! route('getedittask',['id'=>$id, 'idls' => $idls, 'idtask' => $item['id'] ]) !!}">{!! $item['question'] !!}</a></td>
		                <td class="list_td alignleft">{!! $item['answer'] !!}</td>
		                <td class="list_td aligncenter">
		                    <a href="{!! route('getedittask',['id'=>$id, 'idls' => $idls, 'idtask' => $item['id'] ]) !!}"><img width="30" height="30" src="{!! asset("public/pt32_template/images/edit.png") !!}" /></a>
		                    <a href="{!! route('deltask',['id'=>$id, 'idls' => $idls, 'idtask' => $item['id']]) !!}" onclick="return accept_del('Bạn có chắc muốn xóa câu hỏi này không?')"><img width="30" height="30" src="{!! asset("public/pt32_template/images/delete.png") !!}" /></a>
		                </td>
			        </tr>
			        @endforeach
				</table>
				</div>
			</div>
			<span class="form_item">
				<input class="button" type="submit" name="btnLessonAdd" value="Đăng bài học" class="button" />
				<a href='{!! url('pt32admin/news/lesson') !!}/{{ $id }}' class="button button3">Hủy</a>
		</fieldset>
</form>

<div id="bg-span" style="display: none; cursor: pointer;" onclick="hideAdd()"></div>
<form id="popup" class="popup" method="POST" style="display: none;" enctype="multipart/form-data" action="{{ action('PostController@addtask', ['id' =>  $id, 'idls' => $idls]) }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label style="font-size: 18px;" for="txt">Nhập câu hỏi: </label>
		<input type="text" name="txtQuestion" class="form-control" id="txt" placeholder="Nhập câu hỏi tại đây">
	</div>
	<div class="form-group">
		<label style="font-size: 18px;" for="txt">Chọn loại nội dung gợi ý? </label>
		<select name="slTypeTask" id="slTypeTask" class="form-control select small-sl">
			<option value="0">Không chọn loại nội dung</option>
			<option value="1">Đoạn văn</option>
			<option value="2">Tranh</option>
			<option value="3">Video</option>
			<option value="4">Audio</option>
		</select>
		<span onclick="showType()" style="cursor: pointer;" class="button btn-select">Chọn</span>
		<span class="form_item" id="spantxt" style="display: none;">
			<textarea id="txtText" style="display: none;" name="txtText" rows="8" class="textbox" value="" >{!! old('txtText') !!}</textarea>
			<script type="text/javascript">
				var editor = CKEDITOR.replace('txtText',{
					language:'vi',
					filebrowserImageBrowseUrl : '../../../../../../public/pt32_template/js/plugin/ckfinder/ckfinder.html?Type=Images',
					filebrowserFlashBrowseUrl : '../../../../../../public/pt32_template/js/plugin/ckfinder/ckfinder.html?Type=Flash',
					filebrowserImageUploadUrl : '../../../../../../public/pt32_template/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
					filebrowserFlashUploadUrl : '../../../../../../public/pt32_template/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				});
			</script>
		</span>

		<input type="file" id="taskImg" name="taskImg" class="textbox button button1"  style="display: none;" />

		<input type="text" id="txtUrl" class="form-control" name="txtUrl" placeholder="Nhập link của Video" style="display: none;" />
		<input type="text" id="txtAudio" class="form-control" name="txtAudio" placeholder="Nhập link của Audio" style="display: none;" />
	</div>
	<div class="form-group f-answer">
    	<label class="control-label col-sm-2" for="txt">Đáp án A: </label>
	    <div class="col-sm-10">
	     	<input type="text" class="form-control" id="txtA" name="txtA" placeholder="Nhập đáp án A">
	    </div>
	</div>
	<div class="form-group f-answer">
    	<label class="control-label col-sm-2" for="txt">Đáp án B: </label>
	    <div class="col-sm-10">
	     	<input type="text" class="form-control" id="txtB" name="txtB" placeholder="Nhập đáp án B">
	    </div>
	</div>
	<div class="form-group f-answer">
    	<label class="control-label col-sm-2" for="txt">Đáp án C: </label>
	    <div class="col-sm-10">
	     	<input type="text" class="form-control" id="txtC" name="txtC" placeholder="Nhập đáp án C">
	    </div>
	</div>
	<div class="form-group f-answer">
    	<label class="control-label col-sm-2" for="txt">Đáp án D: </label>
	    <div class="col-sm-10">
	     	<input type="text" class="form-control" id="txtD" name="txtD" placeholder="Nhập đáp án D">
	    </div>
	</div>
	<div class="form-group f-answer">
    	<label class="control-label col-sm-2" for="txt">Đáp án đúng là: </label>
	    <div class="col-sm-10">
	     	<select name="slAnswer" id="slAnswer" class="form-control">
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
			</select>
	    </div>
	</div>
	<input type="submit" name="btnTaskAdd" class="button" value="Thêm">
	<a href="" title="Huy" onclick="hideAdd()" class="button button3">Hủy</a>
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
			document.getElementById("taskImg").style.display = "inline-block";
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
	function showAdd() {
	        document.getElementById("popup").style.display = "block";
	        document.getElementById("bg-span").style.display = "inline-block";
	    }
	function hideAdd() {
		document.getElementById("popup").style.display = "none";
	    document.getElementById("bg-span").style.display = "none";
	}
</script>
@endsection