<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../inc/fonctions.php';

class FonctionsTest extends TestCase
{
    public function testChaqueFonctionRetourneTitreEtCss()
    {
        foreach (['accueil', 'liste', 'contact'] as $page) {
            [$titre, $css] = $page();
            $this->assertIsString($titre);
            $this->assertNotEmpty($css);
        }
    }
}