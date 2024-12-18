<?php
require_once "./db/ConnectDB.php";

new Database();
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
    <time>2024年12月13日</time>
    <p>元旦を熱い気持ちで迎えましょう！</p>
    <p>こちらのサービスはタイムゾーンに対応しています。下記からタイムゾーンを選択してください。</p>
  </header>
  <main>
    <p>下記よりタイムゾーンを選択してください</p>
    <select name="timezone" id="timezone">
      <option>日本</option>
      <option>アメリカ</option>
      <option>イギリス</option>
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
</body>
</html>
