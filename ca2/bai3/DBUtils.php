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
        // echo "<pre>";
        // var_dump($stmt);
        // echo "</pre>";
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    public function delete($table, $where)
    {
        /**
         * table categories delete id = 3
         * delete from categories where id = 3;
         *
         */
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function insert($table, $data)
    {
        $keys = array_keys($data);
        $fields = implode(", ", $keys);
        $placeholders = ":" . implode(", :", $keys);
        /**
         * insert into categories(name) values (:name)
         */
        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        $stmt = $this->connection->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $this->connection->lastInsertId();
    }

    public function update($table, $data, $condition)
    {   
        /**
         * ['name' => 'abc']
         */
        // update categories set name =  :name where id = 1
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
}