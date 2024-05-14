<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
function update($table, $data, $condition)
{
    $updateFields = [];

    foreach ($data as $key => $value) {
        $updateFields[] = "$key = :$key";
    }
    $updateFields = implode(", ", $updateFields);
    $sql = "UPDATE $table SET $updateFields WHERE $condition";
    var_dump($sql);
}

function insert($table, $data)
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
    // $stmt = $this->connection->prepare($sql);

    // foreach ($data as $key => $value) {
    //     $stmt->bindValue(":$key", $value);
    // }

    // $stmt->execute();
    // return $this->connection->lastInsertId();
}
update("category", ["name" => "apple"], "id =1");
insert("category", ["name" => "apple"]);
