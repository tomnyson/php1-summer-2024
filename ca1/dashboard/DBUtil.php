<?php
include "./provider.php";
class DBUntil
{
    /**x
     * xay dung ham CRUD
     */
    private $connection = null;
    function __construct($host, $username, $password, $dbname)
    {
        $db = new Database($host, $username, $password, $dbname);
        $this->connection = $db->getConnection();
    }
    public function select($sql, $params = [])
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt->setFetchMode(PDO::FETCH_ASSOC);
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
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
