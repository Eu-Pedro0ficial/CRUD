<?php


function load(){
    $view = 'home';
    if(isset($_GET['view'])){
        $view = strip_tags($_GET['view']);
    }
    if(isset($_GET['controllers'])){
        $view = strip_tags($_GET['controllers']);

        return require "../app/controllers/{$view}.php";

    }

    return require "../app/views/{$view}.php";
}
