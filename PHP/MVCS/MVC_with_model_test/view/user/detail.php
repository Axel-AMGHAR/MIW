<?php
/** @var User $user */
/** @var Ticket $tickets */
?>

<a href="<?php echo ROOT ?>user/liste">< Retour</a>

<h1>User :</h1>
<h2><?php echo $user->name?></h2>

<h3>Ticket écrits :</h3>

<ul>
    <?php foreach ($tickets as $ticket ) {
        echo '<li><a href="'. ROOT .'ticket/detail?id='. $ticket->id .'">'. $ticket->title.'</a></li>';
    }?>
</ul>