<?php

namespace app\models;
use app\database\Connection;

class Delete{

    public function delete($table, $where){
        $pdo = Connection::connect();

        $field = array_keys($where);
        $sql = "delete from {$table} where {$field[0]} = :{$field[0]}";
        $delete = $pdo->prepare($sql);
        $delete->execute($where);

        return $delete->rowCount();
    }
}