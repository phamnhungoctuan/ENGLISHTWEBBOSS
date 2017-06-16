@extends('page.master')
@section('title', 'Trang chủ')
@section('content')
  
	<div class="post-content">
    
    <div class="wrapper-slider">
      @foreach($datahome as $item)
        <?php $listcate = getListCate($item['category_id']); $catename = getNameCate($item['category_id']); ?>
        <div class="title-slide">
          <h2 class="title-sl">Các khóa học {{ $catename->name }}</h2>
        </div>
        <div class="class-info flexslider">
          <ul class="slides">

          <!-- show slide -->
          

            @foreach( $listcate as $val)
              <li>
                <a href="{!! route('getPost',['url'=>$val['url'], 'id' => $val['id']]) !!}">
                  <span class="roll">
                      <p>Đăng kí</p>
                  </span>

                  <span class="img-cover">
                    <img src="{!! isset($val["image"]) ? asset('public/uploads/news/'.$val["image"]) : asset('public/pt32_template/images/nophoto.png') !!}" width="100%" />
                  </span>
                  <p class="title-cl">{{ $val['title'] }}</p>

                  <span class="excerpt">
                    <p>{{ str_limit($val['intro'],100,' ....') }}</p>
                  </span>

                  <span class="reviews__stats" style="color: #000; width: 100%; height: 29px; line-height: 30px;"><img src="{!! asset('public/pt32_template/images/rank.png') !!}" style="height: 29px !important; width: 109px !important; float: left; margin: 0;">4.4
                  </span>

                  <span class="time">Thời gian: <time>15:00</time></span>
                  <span class="cost">
                    $100
                  </span>
                </a>          
              </li>
            @endforeach
          </ul>
        </div> 
      @endforeach
    </div>
  </div>

@endsection