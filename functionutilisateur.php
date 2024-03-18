<?php

// function bonjour($nom)
// {
//     echo 'Bonjour' . $nom . "\n";
// }
// bonjour('Jean');
// bonjour('Marion');

// function bonjour($nom)
// {
//     return 'Bonjour' . $nom . "\n";
//     //tsy miexecuter ny echo arina return
//     echo "bonjour";
// }
// $salutation = bonjour('Jean');
// echo $salutation;


//valeur par deffaut
/*
function bonjour($nom = "Marc")
{
    return 'BOnjour ' . $nom . "\n";
}
echo bonjour();
*/

//variable de refference
/*
$nom = "Marc";
function bonjour($prenom = null, $nom = null)
{
    if ($prenom === null) {
        return "Bonjour \n";
    }
    return 'BOnjour ' . $nom . " " . $prenom . "\n";
}
echo bonjour("fetra", $nom);

*/
//varriable global
/*
$nom = "Marc";
function bonjour($prenom = null)
{
    global $nom;
    if ($prenom === null) {
        return "Bonjour \n";
    }
    return 'Bonjour ' . $prenom . " " . $nom . "\n";
}
echo bonjour('jean');
*/
/*
function repondre_oui_non($phrase)
{
    while (true) {
        $reponse = readline($phrase . "-(o)ui/(n)on: ");
        if ($reponse === "o") {
            return true;
        } elseif ($reponse === "n") {
            return false;
        }
    }
}
$resltat = repondre_oui_non('Voulez vous continue? ');
var_dump($resltat);
*/
/*
function demander_creneau($phrase = 'Veuillez entrer un creneau')
{
    echo $phrase . "\n";
    while (true) {
        $ouverture = (int)readline('Heure d\'ouverture : ');
        if ($ouverture >= 0 && $ouverture <= 23) {
            break;
        }
    }
    while (true) {
        $fermeture = (int)readline('Heure de fermeture: ');
        if ($fermeture >= 0 && $fermeture <= 23 && $fermeture > $ouverture) {
            break;
        }
    }
    return [$ouverture, $fermeture];
}
$creneau = demander_creneau();
$creneau2 = demander_creneau('Veuillez entrer votre creneau');
var_dump($creneau, $creneau2);
*/

function repondre_oui_non($phrase)
{
    while (true) {
        $reponse = readline($phrase . "-(o)ui/(n)on: ");
        if ($reponse === "o") {
            return true;
        } elseif ($reponse === "n") {
            return false;
        }
    }
}

function demander_creneau($phrase = 'Veuillez entre un creneau ')
{
    echo $phrase . "\n";
    while (true) {
        $ouverture = (int)readline("Heure d'ouverture: ");
        if ($ouverture >= 0 && $ouverture <= 23) {
            break;
        }
    }
    while (true) {
        $fermeture = (int)readline("Heure de fermeture: ");
        if ($fermeture >= 0 && $fermeture <= 23 && $fermeture > $ouverture) {
            break;
        }
    }
    return [$ouverture, $fermeture];
}
function demander_creneaux($phrase = "Veuillez entrer vos creneau? ")
{
    $creneaux = [];
    $continuer = true;
    while ($continuer) {
        $creneaux[] = demander_creneau();
        $continuer = repondre_oui_non('Voulez vous continuer? ');
    }
    return $creneaux;
}
$creneaux = demander_creneaux('Entrez vos creneaux ');
var_dump($creneaux);
