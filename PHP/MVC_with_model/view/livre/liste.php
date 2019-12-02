<?php
/** @var Livre $livres */
?>
<table align="center">
    <thead>
    <tr>
        <th>Auteurs</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody>
<?php foreach($livres as $livre){ ?>
    <tr>
        <td><a href="<?php echo ROOT ?>livre/detail?id=<?php echo $livre->id?>"><?php echo $livre->nom ?></a></td>
        <td><a href="<?php echo ROOT ?>livre/new_or_update?id=<?php echo $livre->id?>"><img src="https://i.ibb.co/ZKKhv2C/edit.png" alt="modifier"></a></td>
        <td><a href="<?php echo ROOT ?>livre/supprimer?id=<?php echo $livre->id?>"><img src="https://i.ibb.co/xGVCLZS/rubbish-bin.png" alt="supprimer"></a></td>

    </tr>
<?php } ?>

    </tbody>
</table>

<a href="<?php echo ROOT ?>livre/new_or_update?action=new"><button><span>Ajouter un livre </span></button></a>
