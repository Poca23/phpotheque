<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../inc/chapitres.php';

class ChapitresTest extends TestCase
{
    public function testChapitresEstUnTableauNonVide()
    {
        $this->assertNotEmpty(chapitres());
    }

    public function testChaqueChapitreATitreEtCouleur()
    {
        foreach (chapitres() as $chapitre) {
            $this->assertArrayHasKey('titre', $chapitre);
            $this->assertArrayHasKey('couleur', $chapitre);
        }
    }
}