<a href="<?php echo ROOT ?>auteur/liste">< Retour</a>
<form action="<?php echo ROOT?>auteur/ajouter_ou_modifier" method="post">
    <label for="">Nom auteur:</label>
    <input type="text" name="nom" value="AMGHAR" required/><br>
    <label for="">Prenom auteur :</label>
    <input type="text" name="prenom" value="Axel" required/><br>
    <label for="">Date de naissance : </label>
    <input type="date" name="date_naissance" value="1999-11-23" required/><br>
    <input type="submit" />
</form>