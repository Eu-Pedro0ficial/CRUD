<?php

require "../bootstrap.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require "../app/views/master.php";