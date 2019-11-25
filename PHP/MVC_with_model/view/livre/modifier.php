<?php
/** @var Livre $livre */
?>
<a href="<?php echo ROOT ?>livre/liste">< Retour</a>
<form action="<?php echo ROOT?>livre/ajouter_ou_modifier?action=modify&id=<?php echo $livre->id?>" method="post">
    <label for="">Nom du livre:</label>
    <input type="text" name="nom" value='<?php echo $livre->nom?>'/>
    <label for="">auteur :</label>
    <input type="text" name="auteur" value='<?php echo $livre->auteur?>' />
    <label for="">resume : </label>
    <input type="text" name="resume" value='<?php echo $livre->resume?>' />
    <label for="isbn">isbn</label>
    <input type="text" name="isbn" value='<?php echo $livre->isbn?>' />
    <label for="">prix</label>
    <input type="text" name="prix" value='<?php echo $livre->prix?>' />
    <input type="submit" />
</form>