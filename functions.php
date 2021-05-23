<?php

function enregistrerFichierEnvoye(array $infoFichier): string
{
        // recupere la valeur de l'heure en string
    $timestamp = strval(time());
    //recupere le chemin d'acces + le nom du fichier 
    $extension = pathinfo(basename($infoFichier["name"]), PATHINFO_EXTENSION);
    // recupere le nom du produit, de l'heure et le chemin du fichier
    $nomDuFichier = 'produit_' . $timestamp . '.' . $extension;
    $dossierStockage = __DIR__ . '/uploads/';

    if (file_exists($dossierStockage) === false)
    {
        mkdir($dossierStockage);
    }

    move_uploaded_file($infoFichier["tmp_name"], $dossierStockage . $nomDuFichier);
    return '/uploads/' . $nomDuFichier;
}

function onVaRediriger(string $path)
{
    // rediriger ver la page router.php
    header('LOCATION: /router.php' . $path);
    die();
}