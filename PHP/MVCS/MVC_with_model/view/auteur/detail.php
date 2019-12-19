<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<?php
/** @var Auteur $auteur */
/** @var Auteur $livres */
?>

<a href="<?php echo ROOT ?>auteur/liste">< Retour</a>

<h1>Auteur :</h1>
<h2><?php echo $auteur->nom . ' ' . $auteur->prenom?></h2>

<h3>Date de naissance :</h3>
<div><?php echo $auteur->date_naissance ?></div>

<h3>Livres écrits :</h3>

<ul>
    <?php foreach ($livres as $livre ) {
        echo '<li><a href="'. ROOT .'livre/detail?id='. $livre->id .'">'. $livre->nom.'</a></li>';
    }?>
</ul>