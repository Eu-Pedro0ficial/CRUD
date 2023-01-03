<?php

namespace app\models;
use app\database\Connection;

class Read{
    
    public function all(string $table){
        $pdo = Connection::connect();

        $sql = "select * from {$table}";
        $all = $pdo->prepare($sql);
        $all->execute();

        return $all->fetchAll();
    }

    public function findBy(string $table,array $where){
        $pdo = Connection::connect();

        $field = array_keys($where);
        $sql = "select * from {$table} where {$field[0]} = :{$field[0]}";

        $findBy = $pdo->prepare($sql);
        $findBy->execute($where);

        return $findBy->fetch();
    }
}