<?php

$bdd = new PDO('mysql:dbname=Bvilles;host=localhost;charset=utf8'
    ,'root',''
    , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

$req = $bdd->prepare('SELECT nom FROM villes where nom LIKE :val LIMIT 8');
$req->bindValue(':val',$_POST['val']. '%');
$req->execute();

$texte = array();
while($row = $req->fetch()){

    array_push($texte, array(
        "villes" => $row['nom'],
    ));
}

echo (json_encode($texte));

$req->closeCursor();
