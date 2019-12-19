<?php

include 'connexion_bdd.php';

$old_name_city= $_POST['old_name_city'];
$name = ucfirst(strtolower($_POST['name_city']));
$country_code = strtoupper($_POST['country_code']);
$district = ucfirst(strtolower($_POST['district']));
$population = $_POST['population'];

$req = $bdd->prepare('UPDATE country
                                SET name=:name_city,countrycode=:country_code,district=:district,population=:population
                                WHERE name=:old_name_city');

$req->bindValue('name_city', $name, PDO::PARAM_STR);
$req->bindValue('country_code', $country_code, PDO::PARAM_STR);
$req->bindValue('district', $district, PDO::PARAM_STR);
$req->bindValue('population', $population, PDO::PARAM_INT);
$req->bindValue('old_name_city', $old_name_city, PDO::PARAM_STR);
$req->execute();

header('Location: detail_pays.php?code_country='.$country_code);