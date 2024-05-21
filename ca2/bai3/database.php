<?php
include_once('config.php');
class Database
{
    private $servername = SERVERNAME;
    private $username = USERNAME;
    private $password = PASSWORD;
    private $dbname = DBNAME;
    private $conn = null;
    function __construct($servername = SERVERNAME, $username = USERNAME, $password = PASSWORD, $dbname = DBNAME)
    {
        $this->servername = $servername;
        $this->$username = $username;
        $this->$password = $password;
        $this->dbname = $dbname;
        $this->conn = null;
    }
    function getConnection()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return  $this->conn;
    }
}
