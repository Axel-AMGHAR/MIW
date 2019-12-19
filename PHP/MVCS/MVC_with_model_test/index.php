<!doctype html>
<head>
    <meta charset="UTF-8">
    <style>*{padding:0;margin:0}button{cursor:pointer;display:block;margin:10px auto;width:15em;text-align:center;color:#fff;font-size:24px;border-radius:4px;background-color:#1b1e24;border:none;padding:20px;transition:all .5s}button span{display:inline-block;position:relative;transition:.5s}button span:after{content:url(https://i.ibb.co/QvYKGtB/plus-1.png);position:absolute;opacity:0;top:0;right:-50px;transition:.5s}button:hover span{padding-right:45px}button:hover span:after{opacity:1;right:0}table{background:#fff;border-radius:3px;border-collapse:collapse;height:320px;margin:auto;max-width:600px;padding:5px;width:100%;box-shadow:0 5px 10px rgba(0,0,0,.1);animation:float 5s infinite}a{text-decoration:none;color:#1e90ff}th{color:#d5dde5;background:#1b1e24;border-bottom:4px solid #9ea7af;border-right:1px solid #343a45;font-size:23px;font-weight:100;padding:24px;text-align:center;text-shadow:0 1px 1px rgba(0,0,0,.1);vertical-align:middle}th:first-child{border-top-left-radius:3px}th:last-child{border-top-right-radius:3px;border-right:none}tr{border-top:1px solid #c1c3d1;color:#666b85;font-size:16px;font-weight:400;text-shadow:0 1px 1px rgba(256,256,256,.1)}tr:hover td{background:#4e5066;color:#fff;border-top:1px solid #22262e}tr:first-child{border-top:none}tr:last-child{border-bottom:none}tr:nth-child(odd) td{background:#ebebeb}tr:nth-child(odd):hover td{background:#4e5066}tr:last-child td:first-child{border-bottom-left-radius:3px}tr:last-child td:last-child{border-bottom-right-radius:3px}td{background:#fff;text-align:center;vertical-align:middle;font-weight:300;font-size:18px;text-shadow:-1px -1px 1px rgba(0,0,0,.1);border-right:1px solid #c1c3d1}td:last-child{border-right:0}th.text-left{text-align:left}th.text-center{text-align:center}th.text-right{text-align:right}td.text-left{text-align:left}td.text-center{text-align:center}td.text-right{text-align:right}</style>
</head>
<body>
<?php
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
// => /php/1/mvc/
?>
<ul>
    <li><a href="<?php echo ROOT?>ticket/liste">Liste tickets</a></li>
    <li><a href="<?php echo ROOT?>user/liste">Liste user</a></li>
</ul>
<br>
<?php

require_once './core/Controller.php';
require_once './core/Model.php';
require_once './model/Livre.php';
require_once './model/Auteur.php';
require_once './model/Ticket.php';
require_once './model/User.php';
require_once './model/Response.php';

$data = explode('/', $_GET['p']);
$data[0] = empty($data[0])?'Accueil':$data[0];
$data[1] = empty($data[1])?'index':$data[1];

$controller = ucfirst($data[0]).'Controller';

$controllerFilename = './controller/'.$controller.'.php';
if(file_exists($controllerFilename)){
    require_once $controllerFilename;
}else{
    die('Controller not found');
}

$controller = new $controller();
$action = $data[1];
if(method_exists($controller, $action)){
    $controller->$action();
}else{
    die('method '.$action.' not found');
}
