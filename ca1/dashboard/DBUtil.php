<?php
ini_set('display_errors', '1');
include "Database.php";
define("HOST", "localhost");
define("DB_NAME", "php1-spring-2024");
define("USERNAME", "root");
define("PASSWORD", "");

class DBUntil
{
    /**x
     * xay dung ham CRUD
     */
    private $connection = null;
    function __construct()
    {
        $db = new Database(HOST, USERNAME, PASSWORD, DB_NAME);
        $this->connection = $db->getConnection();
    }
    public function select($sql, $params = [])
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function insert($table, $data)
    {
        /** 
         *  insert category
         * insert into Category ( name , id ) Values ( "abc" , 1 )
         * table category
         *  ['name' => 'abc', 'id' =>1]
         */
        $keys = array_keys($data);
        $fields = implode(", ", $keys);
        $placeholders = ":" . implode(", :", $keys);
        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        var_dump($sql);
        // insert into Category ( name , id ) Values ( ":name" , :id )
        $stmt = $this->connection->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $this->connection->lastInsertId();
    }
    public function update($table, $data, $condition)
    {
        $updateFields = [];

        foreach ($data as $key => $value) {
            $updateFields[] = "$key = :$key";
        }
        $updateFields = implode(", ", $updateFields);
        $sql = "UPDATE $table SET $updateFields WHERE $condition";
        $stmt = $this->connection->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->rowCount();
    }
    public function delete($table, $condition)
    {
        $sql = "DELETE FROM $table WHERE $condition";
        var_dump($sql);
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
