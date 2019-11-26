<?php

header("Content-Type: text/xml");
$bdd = new PDO('mysql:dbname=produits;host=localhost'
    ,'root',''
    , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

$req = $bdd->query('SELECT * FROM categorie');

$texte = '<?xml version="1.0"?>'. "\n";
$texte .= '<liste>';
while ($row = $req->fetch()){
    $texte .= '<categorie>'.$row['lib_cat'].'</categorie>'. "\n";

}
$req->closeCursor();
$texte .= '</liste>';

echo $texte;

?>