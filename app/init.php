<?php
session_start();

$app = __DIR__;

require_once "{$app}/classes/Database.class.php";

$database = new Database();



function dd($data){
    die(var_dump($data));
}

?>