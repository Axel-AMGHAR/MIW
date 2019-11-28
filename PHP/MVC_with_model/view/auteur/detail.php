<?php
/** @var Auteur $auteur */
?>

<a href="<?php echo ROOT ?>auteur/liste">< Retour</a>

<h1>Auteur :</h1>
<h2><?php echo $auteur->nom . ' ' . $auteur->prenom?></h2>

<h3>Date de naissance</h3>
<div><?php echo $auteur->date_naissance ?></div>