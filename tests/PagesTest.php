<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../inc/pages.php';

class PagesTest extends TestCase
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