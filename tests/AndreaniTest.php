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

    public function testGetAuthorizationTokenProd(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'prod');
        $authorizationToken = $andreani->getAuthorizationToken();
        $this->assertTrue(strlen($authorizationToken) > 1000);
    }

    public function testGetAuthorizationTokenSandbox(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'sandbox');
        $authorizationToken = $andreani->getAuthorizationToken();
        $this->assertTrue(strlen($authorizationToken) > 1000);
    }

}
