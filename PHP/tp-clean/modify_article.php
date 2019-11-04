<?php

require 'config.php';
$bdd = getDB();

if (isset($_GET['id_article']))
    $id = $_GET['id_article'];
else {
    header('Location: index.php');
    die();
}

$reqUser = $bdd->query('SELECT * FROM `user`');
$users = $reqUser->fetchAll(PDO::FETCH_ASSOC);

$req = $bdd->prepare('SELECT * FROM article a JOIN `user` u ON a.id_user=u.id WHERE a.id=:id');
$req->bindValue(':id', $id, PDO::PARAM_INT);
$req->execute();
$article = $req->fetch(PDO::FETCH_ASSOC);

$origDate = $article['datetime'];

$newDate = date("d-m-Y H:i:s", strtotime($origDate));
?>
    <h1>Modifier l'article</h1>
<?php
if (isset($_GET['id_article'])) { ?>
<a href="index.php">< Retour</a><br/>
    <form method="post" enctype="multipart/form-data" action="create_or_modify_article.php">
        <input type="hidden" name="action" value="modify"/>
        <input type="hidden" name="id_article" value="<?php echo $_GET['id_article'] ?>"/>
        <label for="titre">Titre : </label><br/>
        <textarea type="text" id="titre" name="titre"><?php echo $article['titre'] ?></textarea><br/>
        <label for="contenu">Contenu : </label><br/>
        <textarea type="text" id="contennu" name="contenu" ><?php echo nl2br($article['contenu']) ?></textarea><br/>
        <label for="image">Image : </label><br/>
        <input id="image" type="file" name="photo"></br>
        <input type="submit" value="Modifier">
    </form>
<?php }