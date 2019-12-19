<?php

include 'connexion_bdd.php';

$req = $bdd->prepare('INSERT INTO city (name, countrycode,
district, population)
 VALUES(:name, :countrycode, :district, :population)');

$name = ucfirst(strtolower($_POST['name_city']));
$countryCode = $_POST['code_country'];
$district = ucfirst(strtolower($_POST['district']));
$population = $_POST['population'];

$req->bindValue('name', $name, PDO::PARAM_STR);
$req->bindValue('countrycode', $countryCode, PDO::PARAM_STR);
$req->bindValue('district', $district, PDO::PARAM_STR);
$req->bindValue('population', $population, PDO::PARAM_INT);
$req->execute();

header('Location: detail_pays.php?code_country='.$countryCode);
