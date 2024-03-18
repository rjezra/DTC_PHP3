<?php
$annonces = [];
function help()
{
    $listeActions = ["Add => Ajout l'annonce", "liste => Liste d'annonce"];
    foreach ($listeActions as $listeAction) {
        echo "- $listeAction \n";
    }
}
function ajouterAnnonce(&$annonces)
{
    $titre = readline("Entrez le titre d'annonce: ");
    $type = readline("Entrez le type d'annonce: ");
    $prix = readline("Entrez le prix d'annonce: ");
    $annonces[] = [$titre, $type, $prix];
}
function listeAnnonce($annonces)
{
    foreach ($annonces as $key => $annonce) {
        echo "Annonce " . ($key + 1) . "\n";
        echo "Titre: " . $annonce[0] . "\n";
        echo "Type: " . $annonce[1] . "\n";
        echo "Prix: " . $annonce[2] . "\n";
    }
}
while (true) {
    $action = readline("Entre votre action: ");
    if ($action === "help") {
        help();
    }
    if ($action === "add") {
        ajouterAnnonce($annonces);
    } elseif ($action === "liste") {
        listeAnnonce($annonces);
    }
}
