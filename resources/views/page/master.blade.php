<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="phanthanhit.com" />
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet"  type="text/css" href="http://fonts.googleapis.com/css?family=Rufina|Oswald|Roboto+Condensed|Open+Sans" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{!! asset('public/pt32_template/css/page/style.css') !!}" />
	<link rel="stylesheet" href="{!! asset('public/pt32_template/css/page/responsive.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('public/pt32_template/css/flexslider.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('public/pt32_template/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('public/pt32_template/css/font-awesome.css') !!}">
	<script src="{!! asset('public/pt32_template/js/block.js') !!}"></script>
	<!--<script src="{!! asset('public/pt32_template/js/jquery.sticky-kit.min.js') !!}"></script>
	<script src="{!! asset('public/pt32_template/js/jquery.sticky-kit.js') !!}"></script> -->
	<script type="text/javascript" src="{!! asset('public/pt32_template/js/example.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('public/pt32_template/js/sticky-kit.js') !!}"></script>
	<link rel="stylesheet" type="text/css" href="{!! asset('public/pt32_template/js/example.css') !!}">
	<title> @yield('title') </title>
	<script>
	    function openNav() {
	        document.getElementById("mySidenav").style.width = "250px";
	    }

	    function closeNav() {
	        document.getElementById("mySidenav").style.width = "0";
	    }
	    function openLesson() {
	        document.getElementById("select-lesson").style.display = "inline-block";
	        document.getElementById("bg-close").style.display = "inline-block";
	    }
	    function closeLesson() {
	        document.getElementById("select-lesson").style.display = "none";
	        document.getElementById("bg-close").style.display = "none";
	    }
	    jQuery(document).ready(function($){ 	
			$(".main").stick_in_parent({offset_top: 70});
		});
	    	
  	</script>
</head>
<body>
<div id="container">
	<header class="top-bar">
		<div class="logo">
			<a href="{!!asset('/')!!}" >English Education</a>
		</div>
		<span id="btn-menu" style="font-size:40px; color: #4CAF50; cursor:pointer; float: right;" onclick="openNav()">&#9776;</span>
		 <div class="nav-menu sidenav" id="mySidenav">
		    <div id="menu">
		      <ul>
		        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		        <li><a href="#">Các khóa hiện có  <span class="caret"></span></a>
		          <ul class="sub-menu">
		            <li><a href="#">Khóa tiếng anh cơ bản</a></li>
		            <li><a href="#">Khóa tiếng anh giao tiếp</a></li>
		            <li><a href="#">Khóa tiếng anh nâng cao</a></li>
		          </ul>
		        </li>
		        <li><a href="#">Tiện ích  <span class="caret"></span></a>
		          <ul class="sub-menu">
		            <li><a href="#">Video</a></li>
		            <li><a href="#">Hình ảnh</a></li>
		            <li><a href="#">Âm thanh</a></li>
		            <li><a href="#">Bài viết</a></li>
		            <li><a href="#">chia sẽ</a></li>
		          </ul>
		        </li>
		        <li><a href="#">Blog</a></li>
		        	@if(Auth::check()) 
		        		@if (Auth::user()->level == 1)
		        			<li><a href="{!! url('pt32admin') !!}" title="">Admin</a></li>
		        		@endif
			        	@if (Auth::user()->level == 2) 
			        		<li><a href="{!! url('pt32admin') !!}" title="">Mod</a></li>
			        	@endif
			        		<li><a href="" title="">User</a></li>

			        @endif

		        	@if(Auth::check())
		        		<li><a href="{!! url('logout') !!}" title="">Đăng xuất</a></li>
		        	@else
			        	<li><a href="{!! url('login') !!}" title="">Đăng nhập</a></li>
			        	<li><a href="{!! url('register') !!}">Đăng kí</a></li>
			        @endif

		      </ul>
		    </div>
		  </div>
	</header>


<div id="body">
	
	@yield('content')
</div>
	
	@include('page.foot')

	
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="{!! asset('public/pt32_template/js/jquery.flexslider.js') !!}"></script>

  <script type="text/javascript">

    (function() {

      // store the slider in a local variable
      var $window = $(window),
          flexslider = { vars:{} };

      // tiny helper function to add breakpoints
      function getGridSize() {
        return (window.innerWidth < 600) ? 2 :
               (window.innerWidth < 1000) ? 3 : 6;
      }

      $(function() {
        SyntaxHighlighter.all();
      });

      $window.load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          animationSpeed: 400,
          animationLoop: false,
          itemWidth: 210,
          itemMargin: 10,
          minItems: getGridSize(), // use function to pull in initial value
          maxItems: getGridSize(), // use function to pull in initial value
          start: function(slider){
            $('body').removeClass('loading');
            flexslider = slider;
          }
        });
      });

      // check grid size on resize event
      $window.resize(function() {
        var gridSize = getGridSize();

        flexslider.vars.minItems = gridSize;
        flexslider.vars.maxItems = gridSize;
      });
    }());

  </script>


  <!-- Syntax Highlighter -->
  <script type="text/javascript" src="{!! asset('public/pt32_template/js/shCore.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('public/pt32_template/js/shBrushXml.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('public/pt32_template/js/shBrushJScript.js') !!}"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="{!! asset('public/pt32_template/js/jquery.easing.js')!!}"></script>
  <script src="{!! asset('public/pt32_template/js/jquery.mousewheel.js') !!}"></script>
</body>
</html>