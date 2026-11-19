<?php

require_once __DIR__ . '/base.php';

function afficherPage($page, $contenu)
{
    [$titre, $css] = $page();

    ob_start();
    try {
        require base('partiel/header.php');
        $contenu();
        require base('partiel/footer.php');
        ob_end_flush();
    } catch (Exception $e) {
        ob_end_clean();
        http_response_code(500);
        require base('500.php');
    }
}