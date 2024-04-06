<?php
$result = [];
$personnes = [
    [
        "nom" => "rakoto",
        "prenom" => "Rasoa",
        "age" => 36
    ], [
        "nom" => "Fetra",
        "prenom" => "Feno",
        "age" => 25
    ], [
        "nom" => "Jean",
        "prenom" => "Bozy",
        "age" => 25
    ]
];

foreach ($personnes as $key => $persone) {
    $result["nom"][] = $persone["nom"];
    $result["prenom"][] = $persone["prenom"];
    $result["age"][] = $persone["age"];
}
$stream = fopen("test.csv", "w+");
fputcsv($stream, ["Nom", "Prenom", "Age"], "\t");
foreach ($personnes as $re) {
    $nom = $re["nom"];
    $prenom = $re["prenom"];
    $age = $re["age"];
    fputcsv($stream, [$nom, $prenom, $age], "\t");
}
