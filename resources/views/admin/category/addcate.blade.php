@extends('admin.master')
@section('title', 'Thêm chuyên mục')
@section('content')

<form action="" method="POST" style="">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<fieldset class="box-add-cate">
			<legend>Thêm Chuyên Mục</legend>
			@include('blocks.errorlogin')
			<div class="form-group">
			  	<label style="font-size: 18px;" for="sel">Chọn chuyên mục cha:</label>
			  	<select name="sltCate" class="form-control select">
					<option value="0">Không có danh mục cha</option>
					<?php SelectCateMenu( $dataCate, 0 ,$str="", old('sltCate') ); ?>
				</select> 
			</div>
			<div class="form-group">
			  <label style="font-size: 18px;" for="pwd">Tên chuyên mục mới:</label>
			  <input type="text"  name="txtCateName"  class="form-control" id="pwd" value="{!! old('txtCateName') !!}" >
			</div>
			<span class="form_label"></span>
			<span class="form_item">
				<input class="btn btn-primary" type="submit" name="btnCateAdd" value="Thêm chuyên mục" class="button" />
				<a href='{!! url('pt32admin/category') !!}' class="btn btn-danger">Hủy</a>
		</fieldset>
</form>
@endsection