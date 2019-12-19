<?php
/** @var Ticket $tickets */
?>
<table align="center">
    <thead>
    <tr>
        <th>Titre</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($tickets as $ticket){ ?>
        <tr>
            <td><a href="<?php echo ROOT ?>ticket/detail?id=<?php echo $ticket->id?>"><?php echo $ticket->title ?></a></td>
            <td><a href="<?php echo ROOT ?>ticket/supprimer?id=<?php echo $ticket->id?>"><img src="https://i.ibb.co/xGVCLZS/rubbish-bin.png" alt="supprimer"></a></td>
        </tr>
    <?php } ?>

    </tbody>
</table>

<a href="<?php echo ROOT ?>ticket/_new"><button><span>Ajouter un ticket </span></button></a>

<a href="<?php echo ROOT ?>user/liste"><button><span>Gérer les utilisateurs</span></button></a>
