<?php
/*
$action = (int)readline('Entrez votre avtion: (1: attaque, 2: defendre, 3: passer mon tour)');

if ($action === 1) {
    echo 'J\'attaque';
} elseif ($action === 2) {
    echo 'Je defends';
} elseif ($action === 3) {
    echo 'Je ne fais rien';
} else {
    echo 'Comande inconnue';
}
*/
/* switch ($action) {
    case 1:
        echo 'J\'attaque';
        break;
    case 2:
        echo 'Je defends';
        break;
    case 3:
        echo 'Je ne fais rien';
        break;
    default:
        echo 'Commmande inconnu';
}
*/
$heure = (int)readline('Entrer votre heure: ');

//SI Heure entre 8h ET 11 OU 13h ET 15H
//ALORS le mangasin ouvert
//SI NON
//La mangasin fermer

if (($heure >= 8 && $heure <= 11) || ($heure >= 13 && $heure <= 15)) {
    echo "Le mangasin est ouvert";
} else {
    echo "Le mangasin est Fermenr";
}
