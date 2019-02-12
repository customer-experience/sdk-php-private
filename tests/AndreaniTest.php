<?php

use PHPUnit\Framework\TestCase;

final class AndreaniTest extends TestCase {

    public function testClassHasAttributeUsername(): void {
        $this->assertClassHasAttribute('username', Andreani::class);
    }

    public function testClassHasAttributePassword(): void {
        $this->assertClassHasAttribute('password', Andreani::class);
    }

    public function testClassHasAttributeEntornoProd(): void {
        $andreani = new Andreani('username', 'password', 'prod');
        $this->assertEquals($andreani->getEnvironment(), 'Production');
    }

    public function testClassHasAttributeEntornoAnother(): void {
        $andreani = new Andreani('username', 'password', 232312);
        $this->assertEquals($andreani->getEnvironment(), 'Sandbox');
    }

}
