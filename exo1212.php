<?php
$file = fopen("tes1t.csv", "r");
$keys = fgetcsv($file, 1000, ";");
$data = [];
while ($line = fgetcsv($file, 1000, ";")) {
    $line;
    $rowData = array_combine($keys, $line);
    $data[] = $rowData;
}
$jsonData = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents('output.json', $jsonData);
