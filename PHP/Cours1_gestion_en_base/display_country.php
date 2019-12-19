<?php

include 'connexion_bdd.php';

$country_code= $_POST['code'];

$display_country = $bdd->prepare('SELECT * FROM country WHERE code=:country_code ');
$display_country->bindValue('country_code',$country_code, PDO::PARAM_STR);
$display_country->execute();

while ($row = $display_country->fetch()) {
    ?>

    <form>
        <input type="hidden" name="code" value="<?php echo $row['code'] ?>" />
        <input type="hidden" name="name" value="<?php echo $row['name'] ?>" />
        <input type="hidden" name="continent" value="<?php echo $row['continent'] ?>" />
        <input type="hidden" name="region" value="<?php echo $row['region'] ?>" />
        <input type="hidden" name="surfacearea" value="<?php echo $row['surfacearea'] ?>" />
        <input type="hidden" name="indepyear" value="<?php echo $row['indepyear'] ?>" />
        <input type="hidden" name="population" value="<?php echo $row['population'] ?>" />
        <input type="hidden" name="lifeexpectancy" value="<?php echo $row['lifeexpectancy'] ?>" />
        <input type="hidden" name="gnp" value="<?php echo $row['gnp'] ?>" />
        <input type="hidden" name="gnpold" value="<?php echo $row['gnpold'] ?>" />
        <input type="hidden" name="LocalName" value="<?php echo $row['LocalName'] ?>" />
        <input type="hidden" name="governmentform" value="<?php echo $row['governmentform'] ?>" />
        <input type="hidden" name="headofstate" value="<?php echo $row['headofstate'] ?>" />
        <input type="hidden" name="capital" value="<?php echo $row['capital'] ?>" />
        <input type="hidden" name="code2" value="<?php echo $row['code2'] ?>" />
    </form>

    <?php
}
?>









