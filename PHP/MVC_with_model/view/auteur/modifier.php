<?php
/** @var Auteur $auteur */
?>
<a href="<?php echo ROOT ?>auteur/liste">< Retour</a>
<form action="<?php echo ROOT?>auteur/ajouter_ou_modifier?action=modify&id=<?php echo $auteur->id?>" method="post">
    <label for="">Nom auteur:</label>
    <input type="text" name="nom" value='<?php echo $auteur->nom?>' required/>
    <label for="">Prenom auteur :</label>
    <input type="text" name="prenom" value='<?php echo $auteur->prenom?>' required/>
    <label for="">date_naissance </label>
    <input type="date" name="date" value='<?php echo $auteur->date_naissance?>' required/>
    <input type="submit" />
</form>