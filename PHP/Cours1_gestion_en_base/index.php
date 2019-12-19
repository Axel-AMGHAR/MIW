<?php

$nom 		= 'Amghar';
$prenom 	= 'Axel';
$somme 		= null;
$valeur_max = null;
$valeur_min = null;
$cle_de_max = null;
$cle_de_min = null;

define('AGE', 19);

function est_inferieur ( $nombre_alea, $age ){
	if ($nombre_alea < AGE){
		echo $nombre_alea . ' < ' . AGE . '<br/>';
		return;
	} else {
		$nombre_alea = rand(0,100);
		return est_inferieur($nombre_alea, $age);
	}
}

function somme ($tab){
	$total = null;
	foreach ($tab as $key => $value) 
		$total += $value;
	return $total;
}

function max_value($tab){
	$max_value = null;
	foreach ($tab as $key => $value) {
		if ($tab[$key] > $max_value) $max_value = $tab[$key];
	}
	return $max_value;
}

function min_value($tab){
	$min_value = null;
	foreach ($tab as $key => $value) {
		if ($min_value === null) $min_value = $tab[$key];
		if ($tab[$key] < $min_value) $min_value = $tab[$key];
	}
	return $min_value;
}

function max_key($tab){
	$max_key = null;
	$max_value = null;
	foreach ($tab as $key => $value) {
		if ($tab[$key] > $max_value){
			$max_key = $key;
			$max_value = $tab[$key];
		}
	}
	return $max_key;
}

function min_key($tab){
	$min_value = null;
	$min_key = null;
	foreach ($tab as $key => $value) {
		if ($min_value === null) $min_value = $tab[$key];
		if ($tab[$key] < $min_value)
		{
			$min_key = $key;
			$min_value = $tab[$key];
		}
	}
	return $min_key;
}

echo 'Je m\'appelle ' . $prenom . ' ' . $nom . '<br/>';

$nombre_aleatoire = rand(0,100);
echo $nombre_aleatoire . '<br/>';

est_inferieur($nombre_aleatoire, AGE);

$tab_nombres = [
	-123 =>  03,
	30 	 => -12,
	1	 => -99,
	-4	 =>  123
];

echo 'somme ' . somme($tab_nombres) . '<br/>';

echo 'max_value ' . max_value($tab_nombres) . '<br/>';

echo 'min_value ' . min_value($tab_nombres) . '<br/>';

echo 'max_key ' . max_key($tab_nombres) . '<br/>';

echo 'min_key ' . min_key($tab_nombres) . '<br/>';
