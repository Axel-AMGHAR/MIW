<?php

$bdd = new PDO('mysql:dbname=my_meteo;host=localhost;charset=utf8'
    ,'root',''
    , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

$req = $bdd->prepare('SELECT ville_nom_reel,ville_id FROM villes_france_free WHERE ville_departement=:code ORDER BY ville_nom_reel');
$req->bindValue('code',$_POST['id']);
$req->execute();

$texte = array();
while($row = $req->fetch()){

    array_push($texte, array(
        "id" => $row['ville_nom_reel'],
        "nom" => $row['ville_nom_reel']
    ));
}

echo (json_encode($texte));

$req->closeCursor();