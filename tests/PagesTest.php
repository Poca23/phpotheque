<?php

use PHPUnit\Framework\TestCase;

class PagesTest extends TestCase
{
    private function rendre($page)
    {
        ob_start();
        require __DIR__ . '/../' . $page;
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