<?php

define('HOST', 'localhost');
define('DB_NAME', 'miw');
define('USER', 'root');//bug
define('PASS', '');//bug

function getDB(){
    $bdd = false;
    try{
        $bdd = new PDO(
            'mysql:host='.HOST.';dbname='.DB_NAME.';charset=utf8',
            USER,//bug
            PASS//bug
        );
    }catch(Exception $e){
        var_dump($e);
    }
    return $bdd;
}

function p($data=null){
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}
function d($data= null){
    p($data);
    die();
}