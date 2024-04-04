<?php
$connexion = mysqli_connect("localhost", "root", "", "projet_php");
if (!$connexion) {
    die("Impossible de se connecter");
}

$annonces = [];

function echapeCaractere(&$text)
{
    $text = str_replace('"', '\"', $text);
}
function inputValeur(&$titre, &$type, &$prix)
{
    $titre = readline("Entrez le titre d'annonce: ");
    $type = readline("Entrez le type d'annonce: ");
    $prix = (int)readline("Entrez le prix d'annonce: ");
}
function checkErreur($connexion, $sql, $retour)
{
    if (mysqli_query($connexion, $sql)) {
        echo $retour;
    } else {
        echo "Erreur : " . mysqli_error($connexion) . "\n";
    }
}
function retourAnonceVide($result, $retourAnonce)
{
    if (!$result || mysqli_num_rows($result) === 0) {
        echo $retourAnonce;
        return;
    }
}
function help()
{
    $listeActions = ["Add => Ajout l'annonce", "liste => Liste d'annonce", "modif => modification annonce", "sup => suppression annonces", "select => selection annonce par type", "exit => exit de boucle"];
    foreach ($listeActions as $listeAction) {
        echo "- $listeAction \n";
    }
}
function ajouterAnnonce(&$annonces, &$connexion)
{
    inputValeur($titre, $type, $prix);
    echapeCaractere($titre);
    echapeCaractere($type);
    $sql = sprintf('INSERT INTO annonces (titre, typ, prix) VALUES("%s", "%s", %d)', $titre, $type, $prix);
    $retour = "Ajout annonce OK.\n";
    checkErreur($connexion, $sql, $retour);

    //$annonces[] = [$titre, $type, $prix];
}
function listeAnnonce($annonces, $connexion)
{
    $sql = "SELECT * FROM annonces";
    $result = mysqli_query($connexion, $sql);
    $retourAnonce = "Liste annonce vide \n";
    retourAnonceVide($result, $retourAnonce);
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
    $retourAnonce = "Annonce non trouvée.\n";
    retourAnonceVide($result, $retourAnonce);
    inputValeur($titreM, $typeM, $prixM);
    echapeCaractere($titreM);
    echapeCaractere($typeM);
    $sql = "UPDATE annonces SET titre='$titreM', typ='$typeM', prix='$prixM' WHERE id='$id'";
    $retour = "Mis a jours succes \n";
    checkErreur($connexion, $sql, $retour);
}
function deleteAnnonce($connexion)
{
    $id = (int)readline("Entre le numero d'annonce supprimer: ");
    $sql = "DELETE FROM annonces WHERE id = $id";
    $retour = "Suppression annonce ok.\n";
    checkErreur($connexion, $sql, $retour);
}
function selectAnnonce($connexion)
{
    $recherche = readline("Entre le type et titre d'annonce rechercher: ");
    echapeCaractere($recherche);
    $sql = "SELECT * FROM annonces WHERE typ LIKE '%$recherche%' OR titre LIKE '%$recherche%' OR prix LIKE '%$recherche%'";
    $result = mysqli_query($connexion, $sql);
    $retourAnonce = "Annonce non trouvée.\n";
    retourAnonceVide($result, $retourAnonce);
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
