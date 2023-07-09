<?php

namespace App\services;

function slugify($phrase)
{
    // Convertir la phrase en minuscules
    $slug = strtolower($phrase);

    // Remplace les caractères non alphabétiques et non numériques par un espace
    $slug = preg_replace('/[^a-z0-9]+/', ' ', $slug);

    // Remplace les espaces par des tirets
    $slug = str_replace(' ', '-', $slug);

    // Supprime les caractères spéciaux et les accents
    $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);
    $slug = preg_replace('/[^a-zA-Z0-9-]+/', '', $slug);

    // Supprime les tirets en début et fin de slug
    $slug = trim($slug, '-');

    return $slug;
}
