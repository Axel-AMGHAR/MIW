<?php
/** @var Livre $livre */
/** @var Auteur $auteurs */
?>
<a href="<?php echo ROOT ?>livre/liste">< Retour</a>
<form action="<?php echo ROOT?>livre/ajouter_ou_modifier?action=modify&id=<?php echo $livre->id?>" method="post">
    <label for="">Nom du livre:</label>
    <input type="text" name="nom" value='<?php echo $livre->nom?>' required/><br>
    <label for="">auteur :</label>
    <select name="id_auteur" id="" required><br>
        <?php foreach ($auteurs as $auteur){?>
            <option value="<?php echo $auteur->id ?>" <?php if ($auteur->id == $livre->id_auteur)echo 'selected'?> ><?php echo $auteur->nom .' ' . $auteur->prenom ?></option>;
        <?php } ?>

    </select><br>
    <label for="">resume : </label>
    <input type="text" name="resume" value='<?php echo $livre->resume?>' required/><br>
    <label for="isbn">isbn</label>
    <input type="text" name="isbn" value='<?php echo $livre->isbn?>' required/><br>
    <label for="">prix</label>
    <input type="text" name="prix" value='<?php echo $livre->prix?>' required/><br>
    <input type="submit" />
</form>