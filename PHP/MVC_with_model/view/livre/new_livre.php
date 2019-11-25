<a href="<?php echo ROOT ?>livre/liste">< Retour</a>
<form action="<?php echo ROOT?>livre/ajouter_ou_modifier" method="post">
    <label for="">Nom du livre:</label>
    <input type="text" name="nom" value="nom de mon livre"/>
    <label for="">auteur :</label>
    <input type="text" name="auteur" value="AUTEUR_name" />
    <label for="">resume : </label>
    <input type="text" name="resume" value="secript" />
    <label for="isbn">isbn</label>
    <input type="text" name="isbn" value="3520094" />
    <label for="">prix</label>
    <input type="text" name="prix" value="20" />
    <input type="submit" />
</form>
