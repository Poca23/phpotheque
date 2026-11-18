<?php

use PHPUnit\Framework\TestCase;

class PartielsTest extends TestCase
{
    public function testHeaderContientTitreNavEtCss()
    {
        $titre = 'Mon titre';
        $css = ['main.css'];

        ob_start();
        require __DIR__ . '/../partiel/header.php';
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
        require __DIR__ . '/../partiel/footer.php';
        $html = ob_get_clean();

        $this->assertStringContainsString('CND - Web Is Yours', $html);
        $this->assertStringContainsString('</html>', $html);
    }
}