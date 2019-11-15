<?php
error_reporting(E_ALL);

include 'fonctions.php';
include 'iVehicule.php';
include 'Vehicule.php';
include 'Renault.php';
include 'Bmw.php';

$voiture = new Vehicule();
$voiture->faireLePlein();
$renault = new Renault();
$renault->faireLePlein();
$bmw = new Bmw();
$bmw->faireLePlein();

?>
<style type="text/css">
    table, td, th {
        border: 1px solid #333;
    }
</style>
<table>
    <thead>
    <tr>
        <th>Voiture</th>
        <th>Renault</th>
        <th>Bmw</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i = 0; $i < 100; $i++) {
        if (!$voiture->avancer())
            echo '<td>' . $voiture->getErreur() . '<td/>';
        elseif ()

            if (!$renault->avancer())
                echo 'Renault : ' . $renault->getErreur() . $renault->getKmParcouru() . '<br/>';

        if (!$bmw->avancer())
            echo 'Bmw : ' . $bmw->getErreur() . $bmw->getKmParcouru() . '<br/>';

        echo '</tr>';
    }

    /*
     * TP : Créer 3 classes :
     * - Renault : consomme deux fois moins que Véhicule, a 3% de chance de tomber en panne mécanique en avançant
     * - Bmw : consomme deux fois plus et roule trois fois plus vite que Véhicule, a 5% de chance d'avoir un accident de la route ( http://s2.quickmeme.com/img/cb/cbb19102f4ada827be3c87b54b169e1eb8b50e69631e456600fc8fd2959c3766.jpg )
     */

    ?>
    </tbody>
</table>