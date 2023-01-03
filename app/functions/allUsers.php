<?php

use app\models\Read;

function allUsers(){

    $all = new Read;
    $users = $all->all('users');

    $_SESSION['users'] = $users;
}