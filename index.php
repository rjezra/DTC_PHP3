<?php
/*
$nombre1 = 12;
$nombre2 = 23;

$somme = $nombre1 + $nombre2;

echo "Le somme de 2 nombre: " . $somme;
*/
/*
$anonce = [
    'anonce1' => ['Vente', 'Voiture'],
    'anonce2' => ['Job', 'Dev WEB']
];

foreach ($anonce as list($anonce1, $anonce2)) {
    echo $anonce1 . ' ' . $anonce2;
    echo "\n";
}
*/
/*
$annonce = [
    ["Maison", 100],
    ["Voiture", 200]
];
foreach ($annonce as $annonces) {
    echo  $annonces[1];
}
*/

$annonces = [
    "type" => "Maison",
    "prix" => 10000
];

foreach ($annonces as $key => $annonce) {
    $prix = $annonce[1];
    if ($prix > 1000) {
    } else {
        echo $key . " " . $annonce;
        echo "\n";
    }
}
