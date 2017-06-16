@extends('page.master')
@section('title')

    <?php echo $datanews['title'];?>
@endsection

@section('content')

<div class="container post-content">
  <h1 id="post-title" >Khóa học: <?php echo $datanews['title']; ?></h1>
  <div class="content">

    <div class="col-left">
      <div class="intro-video">
        <iframe src="https://www.youtube.com/embed/<?php echo $datanews['video']; ?>" frameborder="0" allowfullscreen=""></iframe>
      </div>

      <div class="intro-post">
        <h3 id="intro-title">Giới thiệu khóa học:</h3>
        <div class="intro-content">
          <?php echo $datanews['full']; ?>
        </div>
      </div>

      <div class="content-class">
        <h3 id="intro-title">Nội dung khóa học:</h3>      
        <div class="list-part">
          <table>
            <tbody class="list">
              <tr>
                <th>STT</th>
                <th>Tên bài học</th>
              </tr>
              <?php $stt=0; $check = false;?>
              @foreach ($lesson as $item)
                <?php if($check==false) { $idls1 = $item['id']; $check = true;} ?>
                <tr>
                  <td>Bài <?php echo ++$stt; ?></td>
                  <td><?php echo $item['name']; ?></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-right">
      <div class="join-class">

        <div class="btn-join">
          <a href="<?php if (isset($idls1)) echo route('getLesson', ['url' => $url, 'id' => $id, 'idls' => $idls1]); ?>" class="button button6 join">Tham gia khóa học</a>
        </div>

        <div class="cost">
          <span><?php echo $datanews['cost']; ?></span>
        </div>

        <div class="includes">
          <div id="includes-title">Bạn được gì ?</div>
          <!--<span><i class="fa fa-video-camera" aria-hidden="true"></i> Gồm 30 video hướng dẫn</span>-->
          <span><i class="fa fa-file-text-o" aria-hidden="true"></i> Đề thi thử</span>
          <span><i class="fa fa-file-text-o" aria-hidden="true"></i> Từ vựng</span>
          
        </div>

        <div class="buy-step">
          <div class="step-content">
            <div class="step step1">
              <img src="{!! asset("public/pt32_template/images/user.png") !!}"" alt="Đăng kí thành viên" width="68" height="68">
              <span>Đăng kí thành viên</span>
            </div>
            <div class="step step2">
              <img src="{!! asset("public/pt32_template/images/visa.png") !!}" alt="Thanh toán" width="68" height="68">
              <span>Thanh toán</span>
            </div>
            <div class="step step3">
              <img src="{!! asset("public/pt32_template/images/study.png") !!}" alt="Học cả đời" width="68" height="68">
              <span>Học cả đời</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection