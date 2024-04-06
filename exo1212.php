<?php
$connexion = mysqli_connect("localhost", "root", "", "projet_php");
if (!$connexion) {
    die("Impossible de se connecter");
}

$file = fopen("tes1t.csv", "r");
$keys = fgetcsv($file, 1000, ";");
$data = [];
while ($line = fgetcsv($file, 1000, ";")) {
    $line;
    $rowData = array_combine($keys, $line);
    $data[] = $rowData;
}
//insertion BD
foreach ($data as $datadb) {
    $marque = mysqli_escape_string($connexion, $datadb["Marque"]);
    $type = mysqli_escape_string($connexion, $datadb["Type"]);
    $moteur = mysqli_escape_string($connexion, $datadb["Moteur"]);
    $energie = mysqli_escape_string($connexion, $datadb["Energie"]);
    $transmission = mysqli_escape_string($connexion, $datadb["Transmision"]);
    $couleur = mysqli_escape_string($connexion, $datadb["Couleur"]);
    $sql = "SELECT COUNT(*) AS count FROM voiture 
            WHERE Marque = '$marque' AND Type = '$type' AND Moteur = '$moteur' AND Energie = '$energie' 
            AND Transmission = '$transmission' AND Couleur = '$couleur'";
    $result = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count == 0) {
        $insertSql = "INSERT INTO voiture (Marque, Type, Moteur, Energie, Transmission, Couleur) 
                      VALUES ('$marque', '$type', '$moteur', '$energie', '$transmission', '$couleur')";
        if (!mysqli_query($connexion, $insertSql)) {
            echo "Erreur lors de l'insertion : " . mysqli_error($connexion) . "\n";
        }
    }
}

//insertion Json
$jsonData = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents('test.json', $jsonData);
