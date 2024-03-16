<?php

function listeAnnonce($annonces)
{
    for ($i = 0; $i < count($annonces); $i++) {
        $annonce =  $annonces[$i];

        if ($annonce['prix'] > 100) {
            echo $annonce['titre'] . " " . $annonce['type'] . " " . $annonce['prix'] . " c'est l'article plus de 1000";
            echo "\n";
        } else {
            echo $annonce['titre'] . " " . $annonce['type'] . " " . $annonce['prix'] .  " c'est l'article moin de 1000";
            echo "\n";
        }
    }
}
$annonces = [
    [
        "titre" => "maiso",
        "type" => "A loyer",
        "prix" => 100
    ],
    [
        "titre" => "vente",
        "type" => "voiture",
        "prix" => 1000
    ]
];

$annonce2 = [
    [
        "titre" => "Phone",
        "type" => "vente",
        "prix" => 100

    ],
    [
        "titre" => "appareil",
        "type" => "A loyer",
        "prix" => 100

    ],
];
listeAnnonce($annonce2);
