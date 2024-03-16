<?php
/*$eleves = [
    [
        'nom' =>  "Marc",
        'moyenne' => 1
    ],
    [
        'nom' =>  "Jeans",
        'moyenne' => 12
    ]
];

for ($i = 0; $i < count($eleves); $i++) {
    $eleve =  $eleves[$i];

    if ($eleves[$i]['moyenne'] < 10) {
        echo $eleves[$i]['nom'] . " pas de moyene";
        echo "<br/>";
    } else {
        echo $eleves[$i]['nom'] . " Moyenne";
    }
}*/

$nombre = 54;
$estPremier = true;

for ($i = 2; $i < $nombre; $i++) {
    if ($nombre % $i == 0) {
        $estPremier = false;
        echo "Ce nombre n'est pas premier <br/>";
        echo $nombre . " divisible " . $i . "<br/>";
    }
}
if ($estPremier) {
    echo "Ce nombre est premier";
}
