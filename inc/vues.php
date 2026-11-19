<?php

require_once __DIR__ . '/base.php';

function afficherPage($page, $contenu)
{
    [$titre, $css] = $page();

    require base('partiel/header.php');
    $contenu();
    require base('partiel/footer.php');
}