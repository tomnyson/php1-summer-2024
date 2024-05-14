<?php
include "./database.php";
class DBUtils
{
    private $connection = null;
    function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }
    public function select($sql, $params = [])
    {
        var_dump($sql);
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        echo "<pre>";
        var_dump($stmt);
        echo "</pre>";
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
}
