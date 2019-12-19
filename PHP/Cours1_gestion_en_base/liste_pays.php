<?php

include 'connexion_bdd.php';
$res = $bdd->query('SELECT name,code FROM country ORDER BY population DESC');
?>
    <table border="1px">
		<thead>
			<tr>
				<td style="font-weight : bold" >Name Country</td>
			</tr>
		</thead>
		<tbody>
		<?php
while ($row = $res->fetch()){
	?>
			<tr>
				<td><a href="detail_pays.php?code_country=<?php echo $row['code']; ?> "> <?php echo $row['name']; ?> </a></td>
                <td>
                    <form action="delete_country.php" method="post" >
                        <input type="hidden" name="code_country" value="<?php echo $row['code']; ?>" />
                        <input type="submit" value="supprimer pays" />
                    </form>
                </td>
			</tr>

	<?php
}
?>
		</tbody>
	</table>
