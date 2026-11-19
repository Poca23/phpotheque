<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../inc/base.php';

class AffichageTest extends TestCase
{
    private function rendre($page)
    {
        ob_start();
        require base($page);
        return ob_get_clean();
    }

    public function testAccueil()
    {
        $this->assertStringContainsString('Bienvenue', $this->rendre('index.php'));
    }

    public function testListeAfficheLesDouzeChapitres()
    {
        $html = $this->rendre('liste.php');
        $this->assertSame(12, substr_count($html, 'class="livre"'));
    }

    public function testContactContientUnFormulaire()
    {
        $this->assertStringContainsString('<form', $this->rendre('contact.php'));
    }
}