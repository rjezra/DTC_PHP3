<?php

$file = fopen("test.csv", "r");

while (false !== ($line = fgetcsv($file, 1000, "\t"))) {
    var_dump($line);
}
//CSV -> PHP ->ARRAY -> JSON
file_put_contents("test.json", json_encode(["nom" => null, "prenom" => null, "age" => null]));
