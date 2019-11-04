<?php
include 'connexion_bdd.php';

$countrycode = $_GET['countrycode'];
$name = $_GET['name'];

?>
<head>
    <style>
        table {
            border:solid black 3px;
        }

        td {
            border:solid black 1px;
        }

    </style>
</head>
<h1>Pays : <?php echo $name?></h1>

<h4>Ajouter une photo a la gallerie:</h4>
<form enctype="multipart/form-data" action="upload.php?countrycode=<?php echo $countrycode?>&name=<?php echo $name?>&name=" method="post">
    <input type="file" name="photo"><br />
    <label for="description">Description</label>
    <textarea name="description"></textarea>
    <input type="submit" value="Envoyer">
</form>

<h4>Galerie d'images</h4>

<table>
    <thead>
        <tr>
            <th>name</th>
            <th>description</th>
            <th>miniature</th>
        </tr>
    </thead>
    <tbody>

<?php

$imgs = $bdd->prepare('SELECT * FROM gallery WHERE countrycode=:countrycode');
$imgs->bindValue('countrycode',$countrycode,PDO::PARAM_STR);
$imgs->execute();

while ($row = $imgs->fetch()) {
    list($name_photo,$ext) = explode('.',$row['name']);
    $ext = strtolower($ext);
    ?><tr>
            <td><?php echo $name_photo ?></td>
            <td><?php echo $row['description'] ?></td>
            <td>
                <a href="<?php echo '.\\upload\\src\\' . $row['id_gallery'] . '.' . $ext ?>" >
                    <img src="<?php echo 'upload\\thumb\\'.$row['id_gallery'] .'_thumb_150x150.jpg' ?>"/>
                </a>
            </td>
    </tr>
<?php
}
$imgs->closeCursor();

?>
    </tbody>
</table>