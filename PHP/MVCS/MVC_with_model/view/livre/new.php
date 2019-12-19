<?php
/** @var Auteur $auteurs */
?>

<a href="<?php echo ROOT ?>livre/liste">< Retour</a>
<form action="<?php echo ROOT?>livre/ajouter_ou_modifier" method="post">
    <label for="">Nom du livre:</label>
    <input type="text" name="nom" value="Titre livre" required/><br>
    <label for="">auteur :</label>
    <select name="id_auteur" id="" required><br>
        <?php foreach ($auteurs as $auteur){
            echo '<option value="' . $auteur->id .'">' . $auteur->nom .' ' . $auteur->prenom .'</option>';
        }
        ?>
    </select><br>
    <label for="">resume : </label>
    <input type="text" name="resume" value="Lorem ipsum dolor sit amet." required/><br>
    <label for="isbn">isbn</label>
    <input type="text" name="isbn" value="35-200946-34" required/><br>
    <label for="">prix</label>
    <input type="text" name="prix" value="20" required/><br>
    <input type="submit" />
</form>
