<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="現在の通算ログイン日数から次のログインボーナスの日付を計算するアプリです。">
<meta name="keywords" content="パズドラ,ログインボーナス,計算">
<meta name="author" content="Akira Mukai">
<title>【パズドラ】次のログインボーナスはいつですか？ - ログインボーナス日の自動計算アプリ</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style type="text/css">
body { padding-top: 80px; }
@media ( min-width: 768px ) {
  #banner {
    min-height: 300px;
    border-bottom: none;
  }
  .bs-docs-section {
    margin-top: 8em;
  }
  .bs-component {
    position: relative;
  }
  .bs-component .modal {
    position: relative;
    top: auto;
    right: auto;
    left: auto;
    bottom: auto;
    z-index: 1;
    display: block;
  }
  .bs-component .modal-dialog {
    width: 90%;
  }
  .bs-component .popover {
    position: relative;
    display: inline-block;
    width: 220px;
    margin: 20px;
  }
  .nav-tabs {
    margin-bottom: 15px;
  }
  .progress {
    margin-bottom: 10px;
  }
}
</style>

<!--[if lt IE 9]>
  <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<header>
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a href="./#" class="navbar-brand"><i class="fa fa-flask"></i> お役立ちツール</a>
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
    </div>
  </div>
</header>

<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-lg-12">

    <h1 class="page-header">
    <i class="fa fa-calendar-check-o"></i> 【パズドラ】次のログインボーナスはいつですか？<br>
    <small>今後のログインボーナス日を計算します。目指せログイン1,000日 <span class="glyphicon glyphicon-heart" style="color:#f48260;"></span></small>
    </h1>

    </div>

  </div>

  <div class="row">

    <div class="col-lg-12">

      <div class="well bs-component">

      <!-- Forms
      ================================================== -->
      <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post" data-toggle="validator">
      <fieldset>

<?php

$weeks = array("日", "月", "火", "水", "木", "金", "土");
$today = date("Y年m月d日");
$today = $today . "（" . $weeks[date("w")] . "）";

// フォームの値を取得する
if ($_POST) {
  $days = htmlspecialchars( $_POST["days"] );

  // 文頭文末の空白を削除
  $days = trim($days);

}else{

  // サンプルの値
  $days = 555;

}

$remainder = $days % 100;

$bonus_array = array("魔法石×3", "魔法石×5", "魔法石×5", "魔法石×10");

if($days <= 10){
  $bonus1 = $bonus_array[0];
  $bonus2 = $bonus_array[1];
  $bonus3 = $bonus_array[2];
  $bonus4 = $bonus_array[3];
  $bonus5 = $bonus_array[2];
  $bonus6 = $bonus_array[3];
  $bonus7 = $bonus_array[2];
  $bonus8 = $bonus_array[3];
  $bonus9 = $bonus_array[2];
  $bonus10 = $bonus_array[3];
  $add = 10 - $remainder;
  $total1 = $days + $add . "日目";
}elseif($days <= 30){
  $bonus1 = $bonus_array[1];
  $bonus2 = $bonus_array[1];
  $bonus3 = $bonus_array[3];
  $bonus4 = $bonus_array[2];
  $bonus5 = $bonus_array[3];
  $bonus6 = $bonus_array[2];
  $bonus7 = $bonus_array[3];
  $bonus8 = $bonus_array[2];
  $bonus9 = $bonus_array[3];
  $bonus10 = $bonus_array[2];
  $add = 30 - $remainder;
  $total1 = $days + $add . "日目";
}elseif($days <= 60){
  $bonus1 = $bonus_array[2];
  $bonus2 = $bonus_array[3];
  $bonus3 = $bonus_array[2];
  $bonus4 = $bonus_array[3];
  $bonus5 = $bonus_array[2];
  $bonus6 = $bonus_array[3];
  $bonus7 = $bonus_array[2];
  $bonus8 = $bonus_array[3];
  $bonus9 = $bonus_array[2];
  $bonus10 = $bonus_array[3];
  $add = 60 - $remainder;
  $total1 = $days + $add . "日目";
}elseif($days <= 100){
  $bonus1 = $bonus_array[3];
  $bonus2 = $bonus_array[2];
  $bonus3 = $bonus_array[3];
  $bonus4 = $bonus_array[2];
  $bonus5 = $bonus_array[3];
  $bonus6 = $bonus_array[2];
  $bonus7 = $bonus_array[3];
  $bonus8 = $bonus_array[2];
  $bonus9 = $bonus_array[3];
  $bonus10 = $bonus_array[2];
  $add = 100 - $remainder;
  $total1 = $days + $add . "日目";
}elseif($days >= 100 and $remainder <= 50){
  $bonus1 = $bonus_array[2];
  $bonus2 = $bonus_array[3];
  $bonus3 = $bonus_array[2];
  $bonus4 = $bonus_array[3];
  $bonus5 = $bonus_array[2];
  $bonus6 = $bonus_array[3];
  $bonus7 = $bonus_array[2];
  $bonus8 = $bonus_array[3];
  $bonus9 = $bonus_array[2];
  $bonus10 = $bonus_array[3];
  $add = 50 - $remainder;
  $total1 = $days + $add . "日目";
}else{
  $bonus1 = $bonus_array[3];
  $bonus2 = $bonus_array[2];
  $bonus3 = $bonus_array[3];
  $bonus4 = $bonus_array[2];
  $bonus5 = $bonus_array[3];
  $bonus6 = $bonus_array[2];
  $bonus7 = $bonus_array[3];
  $bonus8 = $bonus_array[2];
  $bonus9 = $bonus_array[3];
  $bonus10 = $bonus_array[2];
  $add = 100 - $remainder;
  $total1 = $days + $add . "日目";
}

if($days <= 10){
  $add2 = $add + 20;
  $add3 = $add + 50;
  $add4 = $add + 90;
}elseif($days <= 30){
  $add2 = $add + 30;
  $add3 = $add + 70;
  $add4 = $add + 120;
}elseif($days <= 60){
  $add2 = $add + 40;
  $add3 = $add + 90;
  $add4 = $add + 140;
}else{
  $add2 = $add + 50;
  $add3 = $add + 100;
  $add4 = $add + 150;
}
$add5 = $add4 + 50;
$add6 = $add5 + 50;
$add7 = $add6 + 50;
$add8 = $add7 + 50;
$add9 = $add8 + 50;
$add10 = $add9 + 50;

$total2 = $days + $add2 . "日目";
$total3 = $days + $add3 . "日目";
$total4 = $days + $add4 . "日目";
$total5 = $days + $add5 . "日目";
$total6 = $days + $add6 . "日目";
$total7 = $days + $add7 . "日目";
$total8 = $days + $add8 . "日目";
$total9 = $days + $add9 . "日目";
$total10 = $days + $add10 . "日目";

$day1 = date("Y年m月d日", strtotime("$add day")) . "（" . $weeks[date("w", strtotime("$add day"))] . "）";
$day2 = date("Y年m月d日", strtotime("$add2 day")) . "（" . $weeks[date("w", strtotime("$add2 day"))] . "）";
$day3 = date("Y年m月d日", strtotime("$add3 day")) . "（" . $weeks[date("w", strtotime("$add3 day"))] . "）";
$day4 = date("Y年m月d日", strtotime("$add4 day")) . "（" . $weeks[date("w", strtotime("$add4 day"))] . "）";
$day5 = date("Y年m月d日", strtotime("$add5 day")) . "（" . $weeks[date("w", strtotime("$add5 day"))] . "）";
$day6 = date("Y年m月d日", strtotime("$add6 day")) . "（" . $weeks[date("w", strtotime("$add6 day"))] . "）";
$day7 = date("Y年m月d日", strtotime("$add7 day")) . "（" . $weeks[date("w", strtotime("$add7 day"))] . "）";
$day8 = date("Y年m月d日", strtotime("$add8 day")) . "（" . $weeks[date("w", strtotime("$add8 day"))] . "）";
$day9 = date("Y年m月d日", strtotime("$add9 day")) . "（" . $weeks[date("w", strtotime("$add9 day"))] . "）";
$day10 = date("Y年m月d日", strtotime("$add10 day")) . "（" . $weeks[date("w", strtotime("$add10 day"))] . "）";

$add_2 = $add + 1;
$add2_2 = $add2 + 1;
$add3_2 = $add3 + 1;
$add4_2 = $add4 + 1;
$add5_2 = $add5 + 1;
$add6_2 = $add6 + 1;
$add7_2 = $add7 + 1;
$add8_2 = $add8 + 1;
$add9_2 = $add9 + 1;
$add10_2 = $add10 + 1;

$event1 = array(
  "title" => "パズドラ 通算ログイン" . $total1,
  "description" => "ログインボーナスは、" . $bonus1 . "です。",
  "place" => "東京",
  "start_date" => date("Ymd", strtotime("$add day")),
  "end_date" => date("Ymd", strtotime("$add_2 day"))
);

$url1 = "http://www.google.com/calendar/event?" . "action=" . "TEMPLATE" . "&text=" . $event1["title"] . "&details=" . $event1["description"] . "&location=" . $event1["place"] . "&dates=" . $event1["start_date"]. "/". $event1["end_date"];

$event2 = array(
  "title" => "パズドラ 通算ログイン" . $total2,
  "description" => "ログインボーナスは、" . $bonus2 . "です。",
  "place" => "東京",
  "start_date" => date("Ymd", strtotime("$add2 day")),
  "end_date" => date("Ymd", strtotime("$add2_2 day"))
);

$url2 = "http://www.google.com/calendar/event?" . "action=" . "TEMPLATE" . "&text=" . $event2["title"] . "&details=" . $event2["description"] . "&location=" . $event2["place"] . "&dates=" . $event2["start_date"]. "/". $event2["end_date"];

$event3 = array(
  "title" => "パズドラ 通算ログイン" . $total3,
  "description" => "ログインボーナスは、" . $bonus3 . "です。",
  "place" => "東京",
  "start_date" => date("Ymd", strtotime("$add3 day")),
  "end_date" => date("Ymd", strtotime("$add3_2 day"))
);

$url3 = "http://www.google.com/calendar/event?" . "action=" . "TEMPLATE" . "&text=" . $event3["title"] . "&details=" . $event3["description"] . "&location=" . $event3["place"] . "&dates=" . $event3["start_date"]. "/". $event3["end_date"];

$event4 = array(
  "title" => "パズドラ 通算ログイン" . $total4,
  "description" => "ログインボーナスは、" . $bonus4 . "です。",
  "place" => "東京",
  "start_date" => date("Ymd", strtotime("$add4 day")),
  "end_date" => date("Ymd", strtotime("$add4_2 day"))
);

$url4 = "http://www.google.com/calendar/event?" . "action=" . "TEMPLATE" . "&text=" . $event4["title"] . "&details=" . $event4["description"] . "&location=" . $event4["place"] . "&dates=" . $event4["start_date"]. "/". $event4["end_date"];

$event5 = array(
  "title" => "パズドラ 通算ログイン" . $total5,
  "description" => "ログインボーナスは、" . $bonus5 . "です。",
  "place" => "東京",
  "start_date" => date("Ymd", strtotime("$add5 day")),
  "end_date" => date("Ymd", strtotime("$add5_2 day"))
);

$url5 = "http://www.google.com/calendar/event?" . "action=" . "TEMPLATE" . "&text=" . $event5["title"] . "&details=" . $event5["description"] . "&location=" . $event5["place"] . "&dates=" . $event5["start_date"]. "/". $event5["end_date"];

$event6 = array(
  "title" => "パズドラ 通算ログイン" . $total6,
  "description" => "ログインボーナスは、" . $bonus6 . "です。",
  "place" => "東京",
  "start_date" => date("Ymd", strtotime("$add6 day")),
  "end_date" => date("Ymd", strtotime("$add6_2 day"))
);

$url6 = "http://www.google.com/calendar/event?" . "action=" . "TEMPLATE" . "&text=" . $event6["title"] . "&details=" . $event6["description"] . "&location=" . $event6["place"] . "&dates=" . $event6["start_date"]. "/". $event6["end_date"];

$event7 = array(
  "title" => "パズドラ 通算ログイン" . $total7,
  "description" => "ログインボーナスは、" . $bonus7 . "です。",
  "place" => "東京",
  "start_date" => date("Ymd", strtotime("$add7 day")),
  "end_date" => date("Ymd", strtotime("$add7_2 day"))
);

$url7 = "http://www.google.com/calendar/event?" . "action=" . "TEMPLATE" . "&text=" . $event7["title"] . "&details=" . $event7["description"] . "&location=" . $event7["place"] . "&dates=" . $event7["start_date"]. "/". $event7["end_date"];

$event8 = array(
  "title" => "パズドラ 通算ログイン" . $total8,
  "description" => "ログインボーナスは、" . $bonus8 . "です。",
  "place" => "東京",
  "start_date" => date("Ymd", strtotime("$add8 day")),
  "end_date" => date("Ymd", strtotime("$add8_2 day"))
);

$url8 = "http://www.google.com/calendar/event?" . "action=" . "TEMPLATE" . "&text=" . $event8["title"] . "&details=" . $event8["description"] . "&location=" . $event8["place"] . "&dates=" . $event8["start_date"]. "/". $event8["end_date"];

$event9 = array(
  "title" => "パズドラ 通算ログイン" . $total9,
  "description" => "ログインボーナスは、" . $bonus9 . "です。",
  "place" => "東京",
  "start_date" => date("Ymd", strtotime("$add9 day")),
  "end_date" => date("Ymd", strtotime("$add9_2 day"))
);

$url9 = "http://www.google.com/calendar/event?" . "action=" . "TEMPLATE" . "&text=" . $event9["title"] . "&details=" . $event9["description"] . "&location=" . $event9["place"] . "&dates=" . $event9["start_date"]. "/". $event9["end_date"];

$event10 = array(
  "title" => "パズドラ 通算ログイン" . $total10,
  "description" => "ログインボーナスは、" . $bonus10 . "です。",
  "place" => "東京",
  "start_date" => date("Ymd", strtotime("$add10 day")),
  "end_date" => date("Ymd", strtotime("$add10_2 day"))
);

$url10 = "http://www.google.com/calendar/event?" . "action=" . "TEMPLATE" . "&text=" . $event10["title"] . "&details=" . $event10["description"] . "&location=" . $event10["place"] . "&dates=" . $event10["start_date"]. "/". $event10["end_date"];


$table = <<< EOM
<tr>
  <td>$total1</td>
  <td>$day1</td>
  <td>$bonus1</td>
  <td><a href="{$url1}" target="_blank">カレンダーに登録</a></td>
</tr>
<tr>
  <td>$total2</td>
  <td>$day2</td>
  <td>$bonus2</td>
  <td><a href="{$url2}" target="_blank">カレンダーに登録</a></td>
</tr>
<tr>
  <td>$total3</td>
  <td>$day3</td>
  <td>$bonus3</td>
  <td><a href="{$url3}" target="_blank">カレンダーに登録</a></td>
</tr>
<tr>
  <td>$total4</td>
  <td>$day4</td>
  <td>$bonus4</td>
  <td><a href="{$url4}" target="_blank">カレンダーに登録</a></td>
</tr>
<tr>
  <td>$total5</td>
  <td>$day5</td>
  <td>$bonus5</td>
  <td><a href="{$url5}" target="_blank">カレンダーに登録</a></td>
</tr>
<tr>
  <td>$total6</td>
  <td>$day6</td>
  <td>$bonus6</td>
  <td><a href="{$url6}" target="_blank">カレンダーに登録</a></td>
</tr>
<tr>
  <td>$total7</td>
  <td>$day7</td>
  <td>$bonus7</td>
  <td><a href="{$url7}" target="_blank">カレンダーに登録</a></td>
</tr>
<tr>
  <td>$total8</td>
  <td>$day8</td>
  <td>$bonus8</td>
  <td><a href="{$url8}" target="_blank">カレンダーに登録</a></td>
</tr>
<tr>
  <td>$total9</td>
  <td>$day9</td>
  <td>$bonus9</td>
  <td><a href="{$url9}" target="_blank">カレンダーに登録</a></td>
</tr>
<tr>
  <td>$total10</td>
  <td>$day10</td>
  <td>$bonus10</td>
  <td><a href="{$url10}" target="_blank">カレンダーに登録</a></td>
</tr>


EOM;


?>

      <legend><span class="glyphicon glyphicon-time"></span> <?php echo $today; ?></legend>

        <div class="form-group">
          <label for="inputDays" class="col-lg-3 control-label"><h3>今日で通算ログイン何日目？</h3></label>
          <div class="col-lg-9">
            <div class="input-group input-group-lg">
              <input type="number" class="form-control" id="inputDays" name="days" placeholder="555" aria-describedby="basic-addon" value="<?php echo $days; ?>" maxlength="6" data-error="Bruh, that number is invalid" required>
              <span class="input-group-addon" id="basic-addon">日目</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-calculator"></i> 計算する</button>
          </div>
        </div>

      </fieldset>
      </form>

      </div>

    </div>

  </div>

  <div class="row">

    <div class="col-lg-12">

      <div class="well bs-component">

        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th>通算ログイン</th>
              <th>日 付</th>
              <th>ボーナス</th>
              <th><i class="fa fa-google"></i> 予定追加</th>
            </tr>
          </thead>
          <tbody>
<?php echo $table; ?>
          </tbody>
        </table> 

      </div>

    </div>

  </div>

  <hr>

  <!-- Footer -->
  <footer>
  <div class="row">
    <div class="col-lg-12">
    <p>Copyright (C) 2016 <a href="http://tsukuba42195.top/">Akira Mukai</a></p>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  </footer>

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="./js/validator.js"></script>

<script>
$(function(){
  $(".dropdown").hover(
  function() {
    $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
    $(this).toggleClass('open');
  },
  function() {
    $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
    $(this).toggleClass('open');
  });

});
</script>

</body>
</html>
