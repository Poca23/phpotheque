<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../inc/main.php';
require_once __DIR__ . '/../inc/vues.php';

class VuesTest extends TestCase
{
    public function testAfficherPageContientHeaderContenuEtFooter()
    {
        ob_start();
        afficherPage('contact', function () {
            echo '<p>Contenu test</p>';
        });
        $html = ob_get_clean();

        $this->assertStringContainsString('<title>PHPothèque : contact</title>', $html);
        $this->assertStringContainsString('<p>Contenu test</p>', $html);
        $this->assertStringContainsString('CND - Web Is Yours', $html);
    }

    public function testAfficherPageAffichePage500EnCasDErreur()
    {
        ob_start();
        afficherPage('contact', function () {
            throw new Exception('Erreur test');
        });
        $html = ob_get_clean();

        $this->assertStringContainsString('Erreur 500', $html);
    }
}