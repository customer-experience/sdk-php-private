<?php

use PHPUnit\Framework\TestCase;
use Resources\Environment\Sandbox;

final class SandboxTest extends TestCase {

    public function testGetUrlSandbox(): void {
        $production = new Sandbox();
        $this->assertEquals('https://api.qa.andreani.com/login', $production->getLogin());
    }

}
