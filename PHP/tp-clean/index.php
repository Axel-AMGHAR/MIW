<?php

require 'config.php';
$bdd = getDB();
//liste des 5 derniers articles
$res = $bdd->query('SELECT a.* FROM article a LIMIT 5'); // limit 5
$articles = $res->fetchAll();


?>
<!-- table à l'extérieur de la boucle -->
    <table>
    <tr>
        <th>Titre</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
<?php foreach($articles as $article){ ?>
<?php $origDate = $article['datetime'];
 
 $newDate = date("d-m-Y H:i:s", strtotime($origDate)); //format date : H au lieu de h (format 24/12h)
 ?>
        <tr>
            <td><?php echo $article['titre'] ?></td>
            <td><?php echo $newDate ?></td><!-- supression du echo -->
            <td>
                <a href="article.php?id_article=<?php echo $article['id'] ?>">Lire</a>
                <a href="modify_article.php?id_article=<?php echo $article['id'] ?>">Modifier</a>
            </td>
        </tr>
<?php } ?>
    </table>

<?php
$reqUser = $bdd->query('SELECT * FROM `user`');
$users = $reqUser->fetchAll(PDO::FETCH_ASSOC);
?>
<br/>
<h1>Ajouter un article :</h1>
    <form enctype="multipart/form-data" method="post" action="create_or_modify_article.php">
        <input type="hidden" name="action" value="create"/>
        <label for="user">Utilisateur :</label>
        <select id="user" name="id_user">
            <?php foreach ($users as $user) { ?>
                <option value="<?php echo $user['id'] ?>"><?php echo $user['name'] ?></option>
            <?php } ?>
        </select><br/>
        <label for="titre">Titre : </label>
        <input type="text" id="titre" name="titre"/><br/>
        <label for="contenu">Contenu : </label><br/>
        <textarea type="text" id="contenu" name="contenu"></textarea><br/>
        <label for="image">Image : </label><br/>
        <input id="image" type="file" name="photo"></br>
        <input type="submit" value="envoyer"/>
    </form>