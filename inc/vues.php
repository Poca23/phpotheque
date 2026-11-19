<?php

require_once __DIR__ . '/base.php';

function afficherPage($titre, $css, $contenu)
{
    require base('partiel/header.php');
    $contenu();
    require base('partiel/footer.php');
}