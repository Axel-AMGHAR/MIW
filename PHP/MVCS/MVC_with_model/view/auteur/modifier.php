<?php
/** @var Auteur $auteur */
?>
<a href="<?php echo ROOT ?>auteur/liste">< Retour</a>
<form action="<?php echo ROOT?>auteur/ajouter_ou_modifier?action=modify&id=<?php echo $auteur->id?>" method="post">
    <label for="">Nom auteur:</label>
    <input type="text" name="nom" value='<?php echo $auteur->nom?>' required/><br>
    <label for="">Prenom auteur :</label>
    <input type="text" name="prenom" value='<?php echo $auteur->prenom?>' required/><br>
    <label for="">date_naissance </label>
    <input type="date" name="date_naissance" value='<?php echo $auteur->date_naissance?>' required/><br>
    <input type="submit" />
</form>