<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../inc/main.php';

class MainTest extends TestCase
{
    public function testLesFonctionsSontChargees()
    {
        foreach (['accueil', 'liste', 'contact', 'chapitres'] as $fonction) {
            $this->assertTrue(function_exists($fonction));
        }
    }
}