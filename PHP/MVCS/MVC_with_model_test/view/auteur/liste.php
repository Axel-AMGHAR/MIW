

<?php
/** @var Auteur $auteurs */
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
    <?php foreach($auteurs as $auteur){ ?>
        <tr>
            <td><a href="<?php echo ROOT ?>auteur/detail?id=<?php echo $auteur->id?>"><?php echo $auteur->nom . ' '. $auteur->prenom?></a></td>
            <td><a href="<?php echo ROOT ?>auteur/new_or_update?id=<?php echo $auteur->id?>"><img src="https://i.ibb.co/ZKKhv2C/edit.png" alt="modifier"></a></td>
            <td><a href="<?php echo ROOT ?>auteur/supprimer?id=<?php echo $auteur->id?>"><img src="https://i.ibb.co/xGVCLZS/rubbish-bin.png" alt="supprimer"></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<a href="<?php echo ROOT ?>auteur/new_or_update?action=new"><button><span>Ajouter un auteur </span></button></a>
