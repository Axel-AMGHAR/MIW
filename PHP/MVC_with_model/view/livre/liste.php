<?php
/** @var Livre $livres */
?>
<h1>Livres</h1>
<table>
    <tbody>
<?php foreach($livres as $livre){ ?>
    <tr>
        <td><a href="<?php echo ROOT ?>livre/detail?id=<?php echo $livre->id?>"><?php echo $livre->nom ?></a></td>
        <td><a href="<?php echo ROOT ?>livre/new_or_update?id=<?php echo $livre->id?>">Modifier</a></td>
        <td><a href="<?php echo ROOT ?>livre/supprimer?id=<?php echo $livre->id?>">Supprimer</a></td>

    </tr>
<?php } ?>

    </tbody>
</table>
<a href="<?php echo ROOT ?>livre/new_or_update?action=new">Ajouter un nouveau livre</a>
