<?php

$file = fopen("tes1t.csv", "r");
$key = fgetcsv($file, 1000, "\t");
$data = [];
while ($line = fgetcsv($file, 1000, "\t")) {
    $line;
    $rowData = array_combine($key, $line);
    $data[] = $rowData;
}
//var_dump($data);
//CSV -> PHP ->ARRAY -> JSON
file_put_contents("test.json", json_encode(["nom" => null, "prenom" => null, "age" => null]));
