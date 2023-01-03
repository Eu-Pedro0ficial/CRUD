<?php

function dd(){
    $args = func_get_args();
    $numArgs = func_num_args();
    for ($i=0; $i < $numArgs; $i++) {
        var_dump($args[$i]);
    }
    die();
}