@if (count($errors) > 0)
    <div class="alert alert-danger">
    	<strong>Lỗi!</strong>
        <ul class="error_msg">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
