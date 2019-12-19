<?php

include 'connexion_bdd.php';

$name = $_POST['city_name'];
$population = $_POST['population'];
$country_code = $_POST['country_code'];

$req = $bdd->prepare('DELETE FROM city WHERE name=:city_name AND population=:population ');
$req->bindValue('city_name', $name, PDO::PARAM_STR);
$req->bindValue('population', $population, PDO::PARAM_INT);
$req->execute();

header('Location: detail_pays.php?code_country='.$country_code);
