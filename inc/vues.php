<?php

function afficherPage($titre, $css, $contenu)
{
    require __DIR__ . '/../partiel/header.php';
    $contenu();
    require __DIR__ . '/../partiel/footer.php';
}