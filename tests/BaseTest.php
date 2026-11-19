<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../inc/base.php';

class BaseTest extends TestCase
{
    public function testBaseRenvoieLeDossierDuProjet()
    {
        $this->assertFileExists(base('composer.json'));
        $this->assertFileExists(base('partiel/header.php'));
    }
}