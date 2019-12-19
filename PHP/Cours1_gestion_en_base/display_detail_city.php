<?php

include 'connexion_bdd.php';

$name_city = $_POST['name_city'];
$population = $_POST['population'];

$display_city = $bdd->prepare('SELECT * FROM city WHERE name=:name_city AND population=:population ');
$display_city->bindValue('name_city',$name_city, PDO::PARAM_STR);
$display_city->bindValue('population',$population, PDO::PARAM_STR);
$display_city->execute();

$list_country_code = $bdd->query('SELECT code,name FROM country ');

while($row = $display_city->fetch()) {
    ?>

    <form action="update_city.php" method="post">
        <input type="hidden" name="old_name_city" value="<?php echo $row['name']?>" />
        <label>Nom ville :</label>
        <input type="text" name="name_city" value="<?php echo $row['name']?>"/><br />
        <label>Code pays :</label>
        <select name="country_code">
        <?php while ($code = $list_country_code->fetch()) {?>
            <option <?php
            if ($row['countrycode'] == $code['code']) echo 'selected' ?> value="<?php echo  $code['code']?>" ><?php echo $code['name'] ?></option>
        <?php
        }
        ?>
        </select><br />
        <label>District :</label>
        <input type="string" name="district" value="<?php echo $row['district']?>"/><br />
        <label>population :</label>
        <input type="number" name="population" value="<?php echo $row['population']?>"/><br />
        <input type="submit" value="valider" />
    </form>

    <?php
}

$display_city->closeCursor();