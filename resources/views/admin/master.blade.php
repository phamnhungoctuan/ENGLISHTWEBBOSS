<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
 	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="phanthanhit.com" />
    <link rel="stylesheet" href="{!! asset('public/pt32_template/css/admin/style.css') !!}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="{!! asset('public/pt32_template/js/block.js') !!}"></script>
  <script src="{!! asset('public/pt32_template/js/popup.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('public/pt32_template/js/plugin/ckeditor/ckeditor.js') !!}"></script>
     <link rel="stylesheet"  type="text/css" href="http://fonts.googleapis.com/css?family=Rufina|Oswald|Roboto+Condensed|Open+Sans" />
	<title> @yield('title') </title>
	<script type="text/javascript">
		
	jQuery(document).ready(function($){ 

	    $('#header__icon').click(function(e){
			e.preventDefault();
			$('body').toggleClass('with--sidebar');
		});

	    $('#site-cache').click(function(e){
	      $('body').removeClass('with--sidebar');
	    });

      $('.block-success').delay(3000).slideUp();
    });


	</script>
    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
  </script>
</head>

<body>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
</head>

<div class="site-container">
  <div class="site-pusher">
    <header class="top-bar">
      <div class="logo">
        <a href="{!! url('pt32admin') !!}" >Quản lí::Administrator</a>
      </div>
      <span id="btn-menu" style="font-size:40px; color: #4CAF50; cursor:pointer; float: right;" onclick="openNav()">&#9776;</span>
       <div class="nav-menu sidenav" id="mySidenav">
          <div id="menu">
            <ul>
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <li><a href="{!! url('pt32admin') !!}">Trang chủ quản lí </a></li>
              <li><a href="">Chuyên mục <span class="caret"></span></a>
                <ul class="sub-menu">
                  <li><a href="{!! url('pt32admin/category') !!}">Danh sách chuyên mục</a></li>
                  <li><a href="{!! url('pt32admin/category/add') !!}">Thêm chuyên mục</a></li>
                </ul>
              </li>
              <li><a href="">Khóa học <span class="caret"></span></a>
                <ul class="sub-menu">
                  <li><a href="{!! url('pt32admin/news') !!}">Quản lí khóa học</a></li>
                  <li><a href="{!! url('pt32admin/news/add') !!}">Đăng bài khóa học mới</a></li>
                </ul>
              </li>
              <li><a href="">Thành viên <span class="caret"></span></a>
                <ul class="sub-menu">
                  <li><a href="{!! url('pt32admin/user') !!}">Danh sách thành viên</a></li>
                  <li><a href="{!! url('pt32admin/user/add') !!}">Thêm thành viên mới</a></li>
                </ul>
              </li>
                @if(Auth::check()) 
                  @if (Auth::user()->level == 1)
                    <li><a href="{!! url('pt32admin') !!}" title="">Admin</a></li>
                  @endif
                  @if (Auth::user()->level == 2) 
                    <li><a href="{!! url('pt32admin') !!}" title="">Mod</a></li>
                  @endif

                @endif

                @if(Auth::check())
                  <li><a href="{!! url('logout') !!}" title="">Đăng xuất</a></li>
                @endif

            </ul>
          </div>
        </div>
    </header>
    <!--<header class="header">
      
      <a href="#" class="header__icon" id="header__icon"></a>
      <a href="{!! url('pt32admin') !!}" class="header__logo">Quản lí::Administrator</a>
      
      <nav class="menu">
        <a href="{!! url('/') !!}">Trang chủ</a>
        <a href="{!! url('pt32admin/user') !!}">Quản lí thành viên</a>
        <a href="{!! url('pt32admin/category') !!}">Quản lí chuyên mục</a>
        <a href="{!! url('pt32admin/news') !!}">Quản lí bài viết</a>
        <a href="{!! url('logout') !!}">Logout</a>
      </nav> 
      
      
    </header> -->

    <div class="site-content">
      <div class="container">

        @yield('content')

      </div> <!-- END container -->
    </div> <!-- END site-content -->
    <div class="site-cache" id="site-cache"></div>
  </div> <!-- END site-pusher -->
</div> <!-- END site-container -->



</body>
</html>
