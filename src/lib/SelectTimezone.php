<?
require_once "db/Database.php";

class SelectTimezone
{
    private $conn;

    public function __construct()
    {
        $this->conn =  new Database();
    }

    public function selectTimezone()
    {
        $pdo = $this->conn->connect();
        $sql = "SELECT * FROM timezone ORDER BY display_order ASC";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }
}
