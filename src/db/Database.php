<?php
require_once __DIR__ . '/../vendor/autoload.php';

class Database
{
  private $conn;

  public function __construct()
  {
    // .env ファイルを読み込む
    try {
      $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
      $dotenv->load();
    } catch (Dotenv\Exception\InvalidPathException $e) {
      echo "Error loading .env file: " . $e->getMessage();
    }
  }

  public function connect()
  {
    $con = $_ENV['DB_CONNECTION'];
    $host = $_ENV['DB_HOST'];
    $port = $_ENV['DB_PORT'];
    $dbname = $_ENV['DB_DATABASE'];
    $username = $_ENV['DB_USERNAME'];
    $password =  $_ENV['DB_PASSWORD'];
    try {
      // PDOを使ってデータベースに接続
      $this->conn = new PDO("$con:host=$host;port=$port;dbname=$dbname", $username, $password);
      return $this->conn; // 成功したら接続を返す
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      return null; // 失敗した場合はnullを返す
    }
  }

  public function disConnect()
  {
    $this->conn = null;
  }
}
