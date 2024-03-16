<?php
/*
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
*/

$annonces = [
    'annonce1' => [
        'Type' => 'maison',
        'Prix' => 50
    ],
    'annonce2' => [
        'Type' => 'Voiture',
        'Prix' => 2000
    ]

];
foreach ($annonces as $key => $annonce) {
    if ($annonce['Prix'] > 100) {
        echo "Annonce $key -Type: {$annonce['Type']}, Prix: {$annonce['Prix']} bon article \n";
    } else {
        echo "Annonce $key -Type: {$annonce['Type']}, Prix: {$annonce['Prix']} article faible \n";
    }
}
