<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../inc/vues.php';

class VuesTest extends TestCase
{
    public function testAfficherPageContientHeaderContenuEtFooter()
    {
        ob_start();
        afficherPage('Mon titre', ['main.css'], function () {
            echo '<p>Contenu test</p>';
        });
        $html = ob_get_clean();

        $this->assertStringContainsString('<title>Mon titre</title>', $html);
        $this->assertStringContainsString('<p>Contenu test</p>', $html);
        $this->assertStringContainsString('CND - Web Is Yours', $html);
    }
}