<?php
/** @var User $users */
?>
<table align="center">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user){ ?>
        <tr>
            <td><a href="<?php echo ROOT ?>user/detail?id=<?php echo $user->id?>"><?php echo $user->name ?></a></td>
            <td><a href="<?php echo ROOT ?>user/supprimer?id=<?php echo $user->id?>"><img src="https://i.ibb.co/xGVCLZS/rubbish-bin.png" alt="supprimer"></a></td>
        </tr>
    <?php } ?>

    </tbody>
</table>

<a href="<?php echo ROOT ?>user/_new"><button><span>Ajouter un utilisateur </span></button></a>