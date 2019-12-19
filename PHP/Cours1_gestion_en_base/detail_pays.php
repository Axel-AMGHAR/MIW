<a href="liste_pays.php" > Liste pays</a><br />
<?php

include 'connexion_bdd.php';

$code_country = $_GET["code_country"];

$res = $bdd->prepare('SELECT * FROM country WHERE code=:code');
$res->bindValue('code',$code_country, PDO::PARAM_STR);
$res->execute();

$liste_villes = $bdd->prepare('SELECT * FROM city WHERE countrycode=:code_country ORDER BY name');
$liste_villes->bindValue('code_country',$code_country, PDO::PARAM_STR);
$liste_villes->execute();

?>
<br />
<table border="1px">
	<thead>
		<tr>
			<td>code</td>
			<td>name</td>
			<td>continent</td>
			<td>region</td>
			<td>surface</td>
			<td>indepyear</td>
			<td>population</td>
			<td>expension</td>
			<td>gnp</td>
			<td>gnpold</td>
			<td>localname</td>
			<td>governementform</td>
			<td>headofstate</td>
			<td>capital</td>
			<td>code2</td>
		</tr>
	</thead>
	<tbody>

<?php

while ($row = $res->fetch()){

?>
		<tr>
			<td><?php echo $row['code'] ?></td>
			<td><?php echo $row['name'] ?></td>
			<td><?php echo $row['continent'] ?></td>
			<td><?php echo $row['region'] ?></td>
			<td><?php echo $row['surfacearea'] ?></td>
			<td><?php echo $row['indepyear'] ?></td>
			<td><?php echo $row['population'] ?></td>
			<td><?php echo $row['lifeexpectancy'] ?></td>
			<td><?php echo $row['gnp'] ?></td>
			<td><?php echo $row['gnpold'] ?></td>
			<td><?php echo $row['LocalName'] ?></td>
			<td><?php echo $row['governmentform'] ?></td>
			<td><?php echo $row['headofstate'] ?></td>
			<td><?php echo $row['capital'] ?></td>
			<td><?php echo $row['code2'] ?></td>
            <td>
                <form action="update_country" method="post" >
                    <input type="hidden" name="code" value="<?php echo $row['code'] ?>" />
                    <input type="submit" value="modifier pays" />
                </form>
            </td>
		</tr>
<?php
}

$res->closeCursor();
?>
	</tbody>
</table><br />

<table border="1px" >
	<thead>
		<tr>
			<td>name city</td>
			<td>countrycode</td>
			<td>district</td>
			<td>population</td>
		</tr>
	</thead>

	<tbody>
<?php
while($row = $liste_villes->fetch()){
?>
		<tr>
			<td><?php echo $row['name'] ?></td>
			<td><?php echo $row['countrycode'] ?></td>
			<td><?php echo $row['district'] ?></td>
			<td><?php echo $row['population'] ?></td>
            <td>
                <form action='display_detail_city.php' method="post">
                    <input type="hidden" name="name_city" value="<?php echo $row['name'] ?>"/>
                    <input type="hidden" name="population" value="<?php echo $row['population'] ?>"/>
                    <input type="submit" value="modifier" />
                </form>
                <form action="delete_city.php" method="post">
                    <input type="hidden" name="city_name" value="<?php echo $row['name'] ?>"/>
                    <input type="hidden" name="population" value="<?php echo $row['population'] ?>"/>
                    <input type="hidden" name="country_code" value="<?php echo $row['countrycode'] ?>"/>
                    <input type="submit" value="supprimer"/>
                </form>
            </td>
		</tr>
<?php
}

$liste_villes->closeCursor();
?>
	</tbody>
</table>

<h3> Ajouter une ville </h3>
<form action='insert_new_ville.php' method="post">
	<label>Nom ville</label>
	<input type="text" pattern="^[A-Za-z]{1,20}$" name="name_city"/><br />
	<input type="hidden" name="code_country" value="<?php echo $code_country ?> " />
	<label>district</label>
	<input type="text" name="district"/><br />
	<label>population</label>
	<input type="number" name="population" /><br />
	<input type="submit" value="Creer ville" />
</form>



