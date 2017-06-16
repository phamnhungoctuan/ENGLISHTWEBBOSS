@extends('page.master')
@section('title')
  <?php echo $lesson['name']; ?>
@endsection

@section('content')
  <link rel="stylesheet" type="text/css" href="{!! asset('public/pt32_template/css/ns-default.css') !!}" />
  <link rel="stylesheet" type="text/css" href="{!! asset('public/pt32_template/css/ns-style-bar.css') !!}" />


  <script type="text/javascript" src="{!! asset('public/pt32_template/js/classie.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('public/pt32_template/js/modernizr.custom.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('public/pt32_template/js/notificationFx.js') !!}"></script>

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
          <strong>Kết quả!</strong>
          <input type="hidden" value="{{ session('add-success') }}" name="result-score"/>


      </div>
  @endif
@include('blocks.errorlogin')
@if(session('dapan')) <?php $dapan = Session::get('dapan'); ?> @endif
<span class="bg-close" id="bg-close" onclick="closeLesson()" style="cursor: pointer;"></span>
<div class="container post-content">
  <h1 id="post-title" >Khóa học luyện thi TOEIC online</h1>
  <h2 id="post-title" >Past 1 - <?php echo $lesson['name']; ?></h2>
  <span class="btn-lesson button" onclick="openLesson()" style="cursor: pointer;">CHỌN BÀI HỌC</span>

  <div class="select-lesson" id="select-lesson">
    <span class="button" onclick="closeLesson()" style="cursor: pointer;">&times;</span>
    <ul class="lesson">
      <?php listLessonsl($listlesson,$id, $url, $idls, 0, '');?>
    </ul>
  </div>


  <div class="content" data-sticky_parent>
    <div class="sidebar" data-sticky_column>
      <span id="lesson-title">CHỌN BÀI HỌC</span>
      <ul class="lesson">
        
        <?php listLessonsl($listlesson, $id, $url, $idls, 0, '');?>

      </ul>
    </div>

    <div class="main inline_columns" data-sticky_column data-sticky_parent>
      <div class="intro-video">
          <iframe src="https://www.youtube.com/embed/YAVDRPb5PYQ" frameborder="0" allowfullscreen=""></iframe>
        </div>
      <h3 id="intro-title">Bài tập thực hành:</h3>
      <form action="{{ route('checkanswer', ['id'=>$id, 'idls'=>$idls, 'url'=>$url]) }}" method="POST" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="intro-content">
            <ul class="test">
              <?php $stt=0; $class = '';?>
              @foreach($task as $item)
                <li>
                  <h3>Bài <?php echo ++$stt; ?>: <?php echo $item['question']; ?></h3>
                  <div class="row">
                      @if($item['type'] == 1)<div class="content-test"> @else <div class="col-sm-4"> @endif
                      @if($item['type'] == 1)
                        <?php echo $item['content']; ?>
                      @endif
                      @if($item['type']==2)
                        <img src="{!! $item['type'] == 2 ? asset('public/uploads/news/'.$item['content']) : asset('public/pt32_template/images/nophoto.png') !!}" alt="swimming" width="100%">
                      @endif
                      @if($item['type']==4)
                        <audio src="<?php echo $item['content']; ?>"
                   preload="none" controls loop>
                        <p>Trình duyệt của bạn không hỗ trợ HTML5 Audio</p>
                      @endif
                      </audio>
                    </div>
                    @if($item['type'] == 1) <div class="sl-answer"> @else <div class="col-sm-8"> @endif
                      <div class="form-group">
                        <input type="radio"  name="test<?php echo $item['id']; ?>" id="t<?php echo $stt; ?>A" value="A"
                        @if(isset($dapan) && ($dapan[$item['id']] == $item['answer']) && $item['answer'] == 'A')
                          <?php echo 'checked = "checked"'; $class =""; ?>
                        @else
                          @if(isset($dapan) && $dapan[$item['id']]=='A')
                            <?php echo 'checked="checked"';
                              $class = "button3";
                            ?>
                          @endif
                        @endif
                        >
                        <label for="t<?php echo $stt; ?>A" 
                          @if(isset($dapan) && $dapan[$item['id']]=='A') class="<?php echo $class; ?>" @endif
                        >A</label> <p id="answer"><?php echo $item['A']; ?></p>
                      </div>
                      <div class="form-group">
                        <input type="radio" name="test<?php echo $item['id']; ?>" id="t<?php echo $stt; ?>B" value="B"
                        @if(isset($dapan) && ($dapan[$item['id']] == $item['answer']) && $item['answer'] == 'B')
                          <?php echo 'checked = "checked"'; $class = "";?>
                        @else
                          @if(isset($dapan) && $dapan[$item['id']]=='B')
                            <?php echo 'checked="checked"';
                              $class = "button3";
                            ?>
                          @endif
                        @endif>
                        <label for="t<?php echo $stt; ?>B" 
                        @if(isset($dapan) && $dapan[$item['id']]=='B') class="<?php echo $class; ?>" @endif
                        >B</label> <p id="answer"><?php echo $item['B']; ?></p>
                      </div>
                      <div class="form-group">
                        <input type="radio" name="test<?php echo $item['id']; ?>" id="t<?php echo $stt; ?>C" value="C"
                        @if(isset($dapan) && ($dapan[$item['id']] == $item['answer']) && $item['answer'] == 'C')
                          <?php echo 'checked = "checked"'; $class=""; ?>
                        @else
                          @if(isset($dapan) && $dapan[$item['id']]=='C')
                            <?php echo 'checked="checked"';
                              $class = "button3";
                            ?>
                          @endif
                        @endif>
                        <label for="t<?php echo $stt; ?>C" 
                          @if(isset($dapan) && $dapan[$item['id']]=='C') class="<?php echo $class; ?>" @endif
                        >C</label> <p id="answer"><?php echo $item['C']; ?></p>
                      </div>
                      <div class="form-group">
                        <input type="radio" name="test<?php echo $item['id']; ?>" id="t<?php echo $stt; ?>D" value="D"
                        @if(isset($dapan) && ($dapan[$item['id']] == $item['answer']) && $item['answer'] == 'D')
                          <?php echo 'checked = "checked"'; $class=""; ?>
                        @else
                          @if(isset($dapan) && $dapan[$item['id']]=='D')
                            <?php echo 'checked="checked"';
                              $class = "button3";
                            ?>
                          @endif
                        @endif>
                        <label for="t<?php echo $stt; ?>D" 
                          @if(isset($dapan) && $dapan[$item['id']]=='D') class="<?php echo $class; ?>" @endif
                        >D</label> <p id="answer"><?php echo $item['D']; ?></p>
                      </div>
                    </div>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        <button type="submit" class="button" style="margin-bottom: -50px; float: right;">Chấm điểm</button>
      </form>
    </div>
  </div>

  <script>
      (function() {

          var value = $( "input[name='result-score']" ).val();
          console.log(value);
          if(typeof value !== "undefined"){

              var notification = new NotificationFx({
                  message : '<span class="fa fa-bullhorn"></span><p>'+ value +'</p>',
                  layout : 'bar',
                  effect : 'slidetop',
                  type : 'notice', // notice, warning or error
              });



                  notification.show(120000);


          }


      })();
  </script>



@endsection

