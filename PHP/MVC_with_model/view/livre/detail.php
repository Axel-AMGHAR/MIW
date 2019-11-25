<?php
/** @var Livre $livre */
?>

<a href="<?php echo ROOT ?>livre/liste">< Retour</a>

<h1><?php echo $livre->nom ?></h1>

<h2>Description :</h2>
<div><?php echo $livre->resume ?></div>

<h3>Auteur :</h3>
<div><?php echo $livre->auteur ?></div>

<h3>ISBN :</h3>
<div><?php echo $livre->isbn ?></div>

<h3>prix :</h3>
<div><?php echo $livre->prix ?>€</div>

