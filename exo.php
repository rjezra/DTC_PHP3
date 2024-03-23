<?php
$connexion = mysqli_connect("localhost", "root", "", "projet_php");
if (!$connexion) {
    die("Impossible de se connecter");
}

$annonces = [];
function help()
{
    $listeActions = ["Add => Ajout l'annonce", "liste => Liste d'annonce", "modif => modification annonce", "sup => suppression annonces", "select => selection annonce par type", "exit => exit de boucle"];
    foreach ($listeActions as $listeAction) {
        echo "- $listeAction \n";
    }
}
function ajouterAnnonce(&$annonces, &$connexion)
{
    $titre = readline("Entrez le titre d'annonce: ");
    $type = readline("Entrez le type d'annonce: ");
    $prix = readline("Entrez le prix d'annonce: ");
    $titre = str_replace('"', '\"', $titre);
    $type = str_replace('"', '\"', $type);
    $sql = sprintf('INSERT INTO annonces (titre, typ, prix) VALUES("%s", "%s", %d)', $titre, $type, $prix);
    print_r($sql);
    if (mysqli_query($connexion, $sql)) {
        echo "Ajout annonce OK.\n";
    } else {
        echo "Erreur : " . mysqli_error($connexion) . "\n";
    }

    //$annonces[] = [$titre, $type, $prix];
}
function listeAnnonce($annonces, $connexion)
{
    $sql = "SELECT * FROM annonces";
    $result = mysqli_query($connexion, $sql);
    while ($ligne = mysqli_fetch_assoc($result)) {
        echo "Annonce " . $ligne['id'] . ": " . $ligne['titre'] . ' ' . $ligne['typ'] . ' ' . $ligne['prix'] . "\n";
    }

    /*
    foreach ($annonces as $key => $annonce) {
        echo "Annonce " . ($key + 1) . "\n";
        echo "Titre: " . $annonce[0] . "\n";
        echo "Type: " . $annonce[1] . "\n";
        echo "Prix: " . $annonce[2] . "\n";
    }
*/
}
function updateAnnonce($connexion)
{
    $id = (int)readline("Entrez le numero d'annonce à modifier : ");
    $sql = "SELECT * FROM annonces WHERE id = '$id'";
    $result = mysqli_query($connexion, $sql);
    if (!$result || mysqli_num_rows($result) == 0) {
        echo "Annonce non trouvée.\n";
        return;
    }
    $titreM = readline("Entrez le nouveau titre de l'annonce: ");
    $typeM = readline("Entrez le nouveau type de l'annonce: ");
    $prixM = readline("Entrez le nouveau prix de l'annonce: ");

    $sql = "UPDATE annonces SET titre='$titreM', typ='$typeM', prix='$prixM' WHERE id='$id'";
    if (mysqli_query($connexion, $sql)) {
        echo "MAJ OK.\n";
    } else {
        echo "Erreur : " . mysqli_error($connexion) . "\n";
    }
}
function deleteAnnonce($connexion)
{
    $id = (int)readline("Entre le numero d'annonce supprimer: ");
    $sql = "DELETE FROM annonces WHERE id = $id";
    if (mysqli_query($connexion, $sql)) {
        echo "Suppression annonce ok.\n";
    } else {
        echo "Erreur : " . mysqli_error($connexion) . "\n";
    }
}
function selectAnnonce($connexion)
{
    $type = readline("Entre le type et titre d'annonce rechercher: ");
    $sql = "SELECT * FROM annonces WHERE typ LIKE '%$type%' OR titre LIKE '%$type%'";
    $result = mysqli_query($connexion, $sql);
    while ($ligne = mysqli_fetch_assoc($result)) {
        echo "Annonce " . $ligne['id'] . ": " . $ligne['titre'] . ' ' . $ligne['typ'] . ' ' . $ligne['prix'] . "\n";
    }
}


while (true) {
    $action = readline("Entre votre action: ");
    if ($action === "help") {
        help();
    }
    if ($action === "add") {
        ajouterAnnonce($annonces, $connexion);
    } elseif ($action === "liste") {
        listeAnnonce($annonces, $connexion);
    } elseif ($action === "modif") {
        updateAnnonce($connexion);
    } elseif ($action === "sup") {
        deleteAnnonce($connexion);
    } elseif ($action === "select") {
        selectAnnonce($connexion);
    } elseif ($action === "exit") {
        break;
    }
}
