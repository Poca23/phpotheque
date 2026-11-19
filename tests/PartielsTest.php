<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../inc/base.php';

class PartielsTest extends TestCase
{
    public function testHeaderContientTitreNavEtCss()
    {
        $titre = 'Mon titre';
        $css = ['main.css'];

        ob_start();
        require base('partiel/header.php');
        $html = ob_get_clean();

        $this->assertStringContainsString('<title>Mon titre</title>', $html);
        $this->assertStringContainsString('css/main.css', $html);
        $this->assertStringContainsString('<nav', $html);
        $this->assertStringContainsString('index.php', $html);
        $this->assertStringContainsString('liste.php', $html);
        $this->assertStringContainsString('contact.php', $html);
    }

    public function testFooterContientLeCredit()
    {
        ob_start();
        require base('partiel/footer.php');
        $html = ob_get_clean();

        $this->assertStringContainsString('CND - Web Is Yours', $html);
        $this->assertStringContainsString('</html>', $html);
    }
}