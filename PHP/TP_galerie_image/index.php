<!doctype html>
<html lang="fr">
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
<body>
    <table >
        <thead>
            <tr >
                <th>Pays</th>
            </tr>
        </thead>
        <tbody ">
<?php

include 'connexion_bdd.php';
$pays = $bdd->query('SELECT name,code FROM country ');
while ($row = $pays->fetch()) {
     echo '<tr><td><a href="pays.php?countrycode=' . $row['code']. '&name=' .$row['name']. '">'  . $row['name']. '</a></td></tr>';
}
$pays->closeCursor();
?>
        </tbody>
</table>
</body>
</html>
