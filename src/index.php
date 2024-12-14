<?php
require_once "lib/SelectTimezone.php";
$selectTimezone = new SelectTimezone();
$timezoneAll = $selectTimezone->selectTimezone();
$defaultDate = new DateTime('now', new DateTimeZone('Asia/Tokyo'));
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Midnight Crescendo</title>
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <header>
    <h1>Midnight Crescendo</h1>
    <time id="currentTime"><?php echo $defaultDate->format('Y/m/d H:i:s');?></time>
    <p>元旦を熱い気持ちで迎えましょう！</p>
    <p>こちらのサービスはタイムゾーンに対応しています。下記からタイムゾーンを選択してください。</p>
  </header>
  <main>
    <p>下記よりタイムゾーンを選択してください</p>
      <select name="timezone" id="timezone">
        <?php foreach ($timezoneAll as $timezone): ?>
          <option value="<?php echo $timezone['timezone_id']; ?>"><?php echo $timezone['description'] ?></option>
        <?php endforeach; ?>
      </select>
      <p>下記より流すBGMを選択してください</p>
      <select name="music" id="music">
        <option>music1</option>
        <option>music2</option>
        <option>music3</option>
      </select>
  </main>
  <footer>
    <p>&copy; 2024 Midnight Crescendo. All rights reserved.</p>
  </footer>
  <script src="js/getTimezone.js"></script>
</body>

</html>