<?php

$bdd = new PDO('mysql:dbname=produits;host=localhost;charset=utf8'
    ,'root',''
    , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

$req = $bdd->prepare('SELECT * FROM produit  where id_cat=:id');
$req->bindValue(':id',$_POST['id']);
$req->execute();

$texte = array();
while($row = $req->fetch()){

    array_push($texte, array(
        "id_cat" => $row['id_pro'],
        "nom" => $row['lib_pro']
    ));
}

echo (json_encode($texte));

$req->closeCursor();
