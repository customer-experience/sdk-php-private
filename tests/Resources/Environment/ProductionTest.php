<?php

use PHPUnit\Framework\TestCase;
use Resources\Environment\Production;

final class ProductionTest extends TestCase {

    public function testGetUrlProduction(): void {
        $production = new Production();
        $this->assertEquals('https://api.andreani.com/login', $production->getLogin());
    }

}
