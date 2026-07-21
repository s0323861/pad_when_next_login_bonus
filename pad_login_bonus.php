<?php
$weeks = array("日", "月", "火", "水", "木", "金", "土");
$today = date("Y年m月d日") . "（" . $weeks[date("w")] . "）";

// フォームの値を取得
$days = isset($_POST["days"]) ? intval(trim($_POST["days"])) : 555;

$remainder = $days % 100;
$bonus_array = array("魔法石×3コ", "魔法石×5コ", "魔法石×5コ", "魔法石×10コ");

// 加算日数の配列計算
$adds = array();
if ($days <= 10) {
    $add = 10 - $remainder;
    $adds = array($add, $add + 20, $add + 50, $add + 90);
} elseif ($days <= 30) {
    $add = 30 - $remainder;
    $adds = array($add, $add + 30, $add + 70, $add + 120);
} elseif ($days <= 60) {
    $add = 60 - $remainder;
    $adds = array($add, $add + 40, $add + 90, $add + 140);
} elseif ($days <= 100) {
    $add = 100 - $remainder;
    $adds = array($add, $add + 50, $add + 100, $add + 150);
} elseif ($days >= 100 && $remainder <= 50) {
    $add = 50 - $remainder;
    $adds = array($add, $add + 50, $add + 100, $add + 150);
} else {
    $add = 100 - $remainder;
    $adds = array($add, $add + 50, $add + 100, $add + 150);
}

// 5〜10番目の加算日数を追加
for ($i = 4; $i < 10; $i++) {
    $adds[$i] = $adds[$i - 1] + 50;
}

// ボーナスの判定関数
function getBonus($days, $index, $bonus_array) {
    if ($days <= 10) {
        $pattern = [0, 1, 2, 3, 2, 3, 2, 3, 2, 3];
    } elseif ($days <= 30) {
        $pattern = [1, 1, 3, 2, 3, 2, 3, 2, 3, 2];
    } elseif ($days <= 60) {
        $pattern = [2, 3, 2, 3, 2, 3, 2, 3, 2, 3];
    } else {
        $pattern = [3, 2, 3, 2, 3, 2, 3, 2, 3, 2];
    }
    return $bonus_array[$pattern[$index]];
}

// テーブル行の生成
$table_rows = "";
for ($i = 0; $i < 10; $i++) {
    $add_day = $adds[$i];
    $total_days = $days + $add_day;
    $target_timestamp = strtotime("+$add_day day");
    $day_str = date("Y年m月d日", $target_timestamp) . "（" . $weeks[date("w", $target_timestamp)] . "）";
    $bonus = getBonus($days, $i, $bonus_array);

    $title = "通算ログイン{$total_days}日";
    $description = "ログインボーナスは{$bonus}です。";
    $place = "東京";

    // 日付フォーマット
    $ymd = date("Ymd", $target_timestamp);
    $ymd_next = date("Ymd", strtotime("+" . ($add_day + 1) . " day"));

    // Yahoo! カレンダー URL
    $yahoo_url = "https://calendar.yahoo.co.jp/?V=60" 
        . "&TITLE=" . urlencode($title) 
        . "&DESC=" . urlencode($description) 
        . "&IN_LOC=" . urlencode($place) 
        . "&ST=" . $ymd . "T0600&DUR=1759";

    // Google カレンダー URL (終日イベントとして作成)
    $google_url = "https://www.google.com/calendar/render?action=TEMPLATE"
        . "&text=" . urlencode($title)
        . "&details=" . urlencode($description)
        . "&location=" . urlencode($place)
        . "&dates=" . $ymd . "/" . $ymd_next;

    $table_rows .= <<<EOM
<tr>
  <td class="align-middle">{$total_days}日</td>
  <td class="align-middle">{$day_str}</td>
  <td class="align-middle">{$bonus}</td>
  <td class="align-middle">
    <div class="d-flex flex-wrap gap-1">
      <a href="{$yahoo_url}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary">
        <i class="fa-solid fa-calendar-plus"></i> Yahoo!
      </a>
      <a href="{$google_url}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-danger">
        <i class="fa-brands fa-google"></i> Google
      </a>
    </div>
  </td>
</tr>
EOM;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="現在の通算ログイン日数から次のログインボーナスの日付を計算するアプリです。">
  <meta name="keywords" content="ソシャゲ,ログインボーナス,計算">
  <meta name="author" content="Akira Mukai">
  <title>次のログインボーナスはいつですか？ - ログインボーナス日の自動計算アプリ</title>

  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome 6 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body { padding-top: 70px; }
  </style>
</head>
<body>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="./#"><i class="fa-solid fa-flask me-1"></i> ログイン日数計算</a>
    </div>
  </nav>
</header>

<main class="container my-4">

  <div class="row">
    <div class="col-lg-12">
      <div class="pb-2 mb-4 border-bottom">
        <h1 class="h2">
          <i class="fa-solid fa-calendar-check me-2"></i>次のログインボーナスはいつですか？
        </h1>
        <p class="text-muted mb-0">
          今後のログインボーナス日を計算します。目指せログイン1,000日 
          <i class="fa-solid fa-heart" style="color:#f48260;"></i>
        </p>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-lg-12">
      <div class="card card-body bg-light">
        <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post" class="needs-validation" novalidate>
          <legend class="fs-5 fw-bold mb-3">
            <i class="fa-solid fa-clock me-1"></i> <?php echo $today; ?>
          </legend>

          <div class="row mb-3 align-items-center">
            <label for="inputDays" class="col-lg-3 col-form-label fs-5 fw-bold">今日で通算ログイン何日？</label>
            <div class="col-lg-9">
              <div class="input-group input-group-lg">
                <input type="number" class="form-control" id="inputDays" name="days" placeholder="1555" value="<?php echo htmlspecialchars($days); ?>" required>
                <span class="input-group-text">日</span>
                <div class="invalid-feedback">有効な数値を入力してください。</div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-9 offset-lg-3">
              <button type="submit" class="btn btn-primary btn-lg">
                <i class="fa-solid fa-calculator me-1"></i> 計算する
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-lg-12">
      <div class="card card-body p-0 border">
        <div class="table-responsive">
          <table class="table table-striped table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th>通算ログイン</th>
                <th>達成日</th>
                <th>ボーナス</th>
                <th>カレンダー登録</th>
              </tr>
            </thead>
            <tbody>
              <?php echo $table_rows; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <footer>
    <div class="row">
      <div class="col-lg-12">
        <p class="text-muted">
          Copyright &copy; 2021-2026 <a href="http://tsukuba42195.sakura.ne.jp/" class="text-decoration-none">Akira Mukai</a> | 
          <a href="https://github.com/akiramukai/pad_when_next_login_bonus" target="_blank" class="text-decoration-none">GitHub</a>
        </p>
      </div>
    </div>
  </footer>

</main>

<!-- Bootstrap 5 JS Bundle (Popper同梱) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/bootstrap.bundle.min.js"></script>

<script>
// Bootstrap 5 のフォームバリデーション
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

</body>
</html>
