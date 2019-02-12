<?php

use PHPUnit\Framework\TestCase;
use Resources\Environment\Production;
use Resources\Environment\Sandbox;

final class ProductionTest extends TestCase {

    public function testGetUrlProduction(): void {
        $production = new Production();
        $this->assertEquals('https://api.andreani.com/login', $production->getLogin());
    }

    public function testGetUrlSandbox(): void {
        $production = new Sandbox();
        $this->assertEquals('https://api.qa.andreani.com/login', $production->getLogin());
    }

}
