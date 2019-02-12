<?php

use PHPUnit\Framework\TestCase;

final class ProductionTest extends TestCase {

    public function testGetUrlProd(): void {
        $production = new Production();
        $this->assertClassHasAttribute("https://api.andreani.com/login", $production->getLogin());
    }

}
