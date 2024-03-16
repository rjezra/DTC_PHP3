<?php
/*
$valeur = null;
while ($valeur !== 10) {
    $valeur = (int)readline('Entre une valuer: ');
}

echo 'Bravo vous avez gagne!';
*/
/*
for ($i = 0; $i < 10; $i++) {
    echo "-$i \n";
}
*/
/*
$notes = [10, 15, 25];

for ($i = 0; $i < 3; $i++) {
    echo "- $notes[$i] \n";
}
*/
/*
$notes = [10, 15, 25];
foreach ($notes as $note) {
    echo "- $note \n";
}
*/
/*
$classes = [
    "nivI" => ["Rakoto", "rasoa", "rabe"],
    "nivII" => ["fetra", "feno", "marie"]
];
foreach ($classes as $niveau => $listEleves) {
    echo "Le liste d'eleve au $niveau: \n";
    foreach ($listEleves as $listEleve) {
        echo "- $listEleve \n";
    }
    echo "\n";
}
*/
/*
$notes = [];
$action = null;

while ($action !== 'fin') {
    $action = readline('Entrer une nouvelle note (ou \'fin\' pour terminer): ');
    if ($action !== 'fin') {
        $notes[] = (int)$action;
    }
}
foreach ($notes as $note) {
    echo "- $note \n";
}
*/

$creneaux = [];

while (true) {
    $debut = (int)readline('Heure d\'ouverture: ');
    $fin = (int)readline('Heure de fermeture: ');
    if ($debut >= $fin) {
        echo "Le creneau ne peut pas etre enregistre car l'heure d'overture $debut est plus grand que l'heure de fermeure $fin \n";
    } else {
        $creneaux[] = [$debut, $fin];
        $action = readline('Entrer un nouveau creneau? (n): ');
        if ($action === 'n') {
            break;
        }
    }
}
echo 'Le mangasin est ouvert de';
foreach ($creneaux as $key => $creneau) {
    if ($key > 0) {
        echo " et de";
    }
    echo " {$creneau[0]}h a {$creneau[1]}h";
}

/*
$heure = (int)readline("A qu'elle heure voulea vous visiter le mangasin ? ");
$creneauTouver = false;

foreach ($creneaux as $creneau) {
    if ($heure >= $creneau[0] && $heure <= $creneau[1]) {
        $creneauTouver = true;
        break;
    }
}
if ($creneauTouver) {
    echo 'Le mangasin sera ouvert';
} else {
    echo 'Desoler, le mangasin sera fermer';
}
*/