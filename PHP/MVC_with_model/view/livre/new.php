<a href="<?php echo ROOT ?>livre/liste">< Retour</a>
<form action="<?php echo ROOT?>livre/ajouter_ou_modifier" method="post">
    <label for="">Nom du livre:</label>
    <input type="text" name="nom" value="Titre livre" required/>
    <label for="">auteur :</label>
    <input type="text" name="auteur" value="AUTEUR_name" required/>
    <label for="">resume : </label>
    <input type="text" name="resume" value="Lorem ipsum dolor sit amet." required/>
    <label for="isbn">isbn</label>
    <input type="text" name="isbn" value="35-200946-34" required/>
    <label for="">prix</label>
    <input type="text" name="prix" value="20" required/>
    <input type="submit" />
</form>
