<?php

include 'connexion_bdd.php';

$country_code = $_POST['code_country'];

$delete_citys = $bdd->prepare('DELETE FROM city WHERE countrycode=:country_code ');
$delete_citys->bindValue('country_code', $country_code, PDO::PARAM_STR);
$delete_citys->execute();

$delete_citys = $bdd->prepare('DELETE FROM countrylanguage WHERE countrycode=:country_code ');
$delete_citys->bindValue('country_code', $country_code, PDO::PARAM_STR);
$delete_citys->execute();

$req = $bdd->prepare('DELETE FROM country WHERE code=:country_code ');
$req->bindValue('country_code', $country_code, PDO::PARAM_STR);
$req->execute();

header('Location: liste_pays.php?');