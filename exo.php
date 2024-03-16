<?php

$annonces = [];

function ajouterAnnonce(&$annonces)
{
    $titre = readline("Entrez le titre de l'annonce: ");
    $type = readline("Entrez le type d'annonce: ");
    $prix = readline("Entrez le prix: ");
    $annonces[] = [$titre, $type, $prix];
    echo "\n";
}

while (true) {
    $action = readline("Entrez votre action: ");
    if ($action === "help") {
        $listeActions = ["Add => Ajour l'annonce", "liste =>Liste Annonce"];
        foreach ($listeActions as $listeAction) {
            echo "- $listeAction \n";
        }
    }
    if ($action === "Add") {
        ajouterAnnonce($annonces);
    } elseif ($action === "liste") {
        foreach ($annonces as $key => $annonce) {
            echo "Annonce " . ($key + 1) . ":\n";
            echo "Titre: " . $annonce[0] . "\n";
            echo "Type: " . $annonce[1] . "\n";
            echo "Prix: " . $annonce[2] . "\n\n";
        }
    }
}
