<?php
/*
$mot = readline("Entre votre mot: ");

$reverse = strtolower(strrev($mot));

if (strtolower($mot) === $reverse) {
    echo 'Ce mot est palyndrome';
} else {
    echo 'Ce mot n\'est pas palyndrome';
}
*/

$insultes = ['merde', 'con'];
$asterisque = [];

foreach ($insultes as $insulte) {
    $asterisque[] = substr($insulte, 0, 1) . str_repeat('*', strlen($insulte) - 1);
}
$phrase = readline("Entrez votre phrase:");
$phrase = str_replace($insultes, $asterisque, $phrase);

echo $phrase;
