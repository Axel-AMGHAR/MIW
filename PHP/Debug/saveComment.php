<?php
require 'config.php';
$bdd = getDB();

$req = $bdd->prepare('INSERT INTO commentaire (titre, contenu, id_user, id_article, datetime) 
        VALUES (:titre, :contenu, :id_user,:id_article,NOW())');//bug
$req->bindValue('titre', $_POST['titre'],PDO::PARAM_STR);//bug
$req->bindValue('contenu', $_POST['contenu'],PDO::PARAM_STR);//bug
$req->bindValue('id_user', $_POST['id_user'],PDO::PARAM_INT);//bug
$req->bindValue('id_article', $_POST['id_article'],PDO::PARAM_INT);//bug
$req->execute();

header('Location: article.php?id_article='.(int)$_POST['id_article']);