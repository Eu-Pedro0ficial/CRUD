<?php

namespace app\models;
use app\database\Connection;

class Update{
    public function update($table, $fields, $where){
        $pdo = Connection::connect();

        $sql = "update {$table} set ";
        foreach ($fields as $key => $value) {
            $sql.= "{$key} = :{$key}, ";
        }
        $sql = rtrim($sql, ', ');
        $field = array_keys($where);
        
        $sql.= " where {$field[0]} = :{$field[0]}";
        $data = array_merge($fields, $where);

        $updated = $pdo->prepare($sql);
        $updated->execute($data);

        return $updated->rowCount();
    }
}