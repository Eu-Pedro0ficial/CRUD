<?php

namespace app\models;
use app\database\Connection;

class Create{

    public function create($table, $fields){
        $pdo = Connection::connect();

        $sql = "insert into {$table}(";
        $sql.= implode(", ", array_keys($fields)).") values(";
        $sql.= ":".implode(", :", array_keys($fields)).")";

        $create = $pdo->prepare($sql);
        $create->execute($fields);

        return $create->rowCount();
    }
}