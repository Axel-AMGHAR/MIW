<?php

$bdd = new PDO('mysql:dbname=my_meteo;host=localhost;charset=utf8'
    ,'root',''
    , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

$req = $bdd->query('SELECT departement_code,departement_nom FROM departement ORDER BY departement_nom');

$texte = array();
while($row = $req->fetch()){

    array_push($texte, array(
        "code" => $row['departement_code'],
        "nom" => $row['departement_nom']
    ));
}

echo (json_encode($texte));

$req->closeCursor();