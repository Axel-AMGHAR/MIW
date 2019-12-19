<?php
/** @var Users $users */
?>

<a href="<?php echo ROOT ?>ticket/liste">< Retour</a>
<form enctype="multipart/form-data" action="<?php echo ROOT?>ticket/ajouter" method="post">
    <label for="">Titre du Ticket:</label>
    <input type="text" name="title" value="Titre ticket" required/><br>
    <label for="">auteur :</label>
    <select name="id_user" id="" required><br>
        <?php foreach ($users as $user){
            echo '<option value="' . $user->id .'">' . $user->name .'</option>';
        }
        ?>
    </select><br>
    <label for="">contenu : </label>
    <input type="text" name="content" value="Lorem ipsum dolor sit amet." required/><br>
    <label for="priority">priority</label>
    <select name="priority" id="priority">
        <option value="low" selected>low</option>
        <option value="important">important</option>
        <option value="critical">critical</option>
    </select>

    <label for="">fichier complémentaire</label>
    <input type="file" name="attached_file" /><br>
    <input type="submit" />
</form>
