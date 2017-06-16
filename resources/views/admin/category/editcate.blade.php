@extends('admin.master')
@section('title', 'Sửa chuyên mục')
@section('content')

<form action="" method="POST" style="">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<fieldset class="box-add-cate">
			<legend>Sửa Chuyên Mục</legend>
			@include('blocks.errorlogin')
			<div class="form-group">
			  <label style="font-size: 18px;" for="sel">Chuyên mục cha:</label>
			  <select name="sltCate" class="form-control select">
					<option value="0">Không có danh mục cha</option>
					<?php SelectCateMenuEdit( $dataCate, 0 ,$str="", $parent["parent_id"] ); ?>
				</select> 
			</div>
			<div class="form-group">
			  <label style="font-size: 18px;" for="pwd">Tên chuyên mục mới:</label>
			  <input type="text"  name="txtCateName"  class="form-control" id="pwd" value="@if(old('txtCateName')){!!olc('txtCateName')!!}@else<?php echo $parent["name"];?>@endif" >
			</div>
			<span class="form_label"></span>
			<span class="form_item">
				<input class="btn btn-primary" type="submit" name="btnCateAdd" value="Sửa chuyên mục" class="button" />
				<a href='{!! url('pt32admin/category') !!}' class="btn btn-danger">Hủy</a>
			</span>
		</fieldset>
</form>  
@endsection