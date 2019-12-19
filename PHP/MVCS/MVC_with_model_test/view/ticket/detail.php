<?php
/** @var Ticket $ticket */
/** @var User $user */
/** @var Response $responses */
/** @var User $users */
?>

<a href="<?php echo ROOT ?>ticket/liste">< Retour</a>

<h1><?php echo $ticket->title ?></h1>

<h2>Description :</h2>
<div><?php echo $ticket->content ?></div>

<h3>Auteur :</h3>
<div><a href="<?php echo ROOT ?>user/detail?id=<?php echo $user->id ?>"><?php echo $user->name  ?></a></div>

<h3>Priorité :</h3>
<div><?php echo $ticket->priority ?></div>

<h3>Dosier lié :</h3>
<div><a href="<?php echo ROOT . $ticket->attached_file ?>" download>Download File</a></div><br>

<h2>Réponses</h2>

<?php foreach ($responses as $response){ ?>
    <h3>Commentaire écrit par <a href="<?php echo ROOT . 'user/detail?id='. $response->id_user?>"><?php echo $response->name_user?></a></h3>
    <div><?php echo $response->content ?></div>
<?php } ?>

<h2>Ajouter un commentaire</h2>
<form action="<?php echo ROOT?>response/ajouter" method="post">
    <select name="id_user" id="" required><br>
        <?php foreach ($users as $user){
            echo '<option value="' . $user->id .'">' . $user->name .'</option>';
        }
        ?>
    </select><br>
    <input type="hidden" name="id_ticket" value="<?php echo $ticket->id?>">
    <input type="text" value="Création d'un nouveau commentaire" name="content">
    <input type="submit">
</form>

