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

    public function testGetMethodsSandbox(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'sandbox');
        $methods = $andreani->getMethods();
        $this->assertEquals(gettype($methods), 'array');
    }

    public function testGetMethodsProd(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'prod');
        $methods = $andreani->getMethods();
        $this->assertEquals(gettype($methods), 'array');
    }

    public function testSizeMethodsProd(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'prod');
        $methods = $andreani->getMethods();
        $this->assertTrue(sizeof($methods) > 1);
    }

    public function testSizeMethodsSandbox(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'sandbox');
        $methods = $andreani->getMethods();
        $this->assertTrue(sizeof($methods) > 1);
    }

    public function testGetMethodParametersProd(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'prod');
        $methods = $andreani->getMethods();
        $this->assertTrue(sizeof($methods) > 1);
    }

    public function testGetMethodParametersSandbox(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'sandbox');
        $methods = $andreani->getMethods();
        $this->assertTrue(sizeof($methods) > 1);
    }

    //////////////////// METHODS ////////////////////

    public function testCallProdEnvioConNumeroAndreani(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'prod');
        $methods = $andreani->call('EnvioConNumeroAndreani', ['NumeroAndreani' => 'G00000302460730']);
        $this->assertTrue(gettype($methods) == 'array');
    }

    public function testCallSandroxEnvioConNumeroAndreani(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'sandbox');
        $methods = $andreani->call('EnvioConNumeroAndreani', ['NumeroAndreani' => 'G00000302460730']);
        $this->assertTrue(gettype($methods) == 'array');
    }

    public function testCallProdTrazaConNumeroAndreani(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'prod');
        $methods = $andreani->call('TrazaConNumeroAndreani', ['NumeroAndreani' => 'G00000302460730']);
        $this->assertTrue(gettype($methods) == 'array');
    }

    public function testCallSandroxTrazaConNumeroAndreani(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'sandbox');
        $methods = $andreani->call('TrazaConNumeroAndreani', ['NumeroAndreani' => 'G00000302460730']);
        $this->assertTrue(gettype($methods) == 'array');
    }

    public function testCallProdEnvioConParametros(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'prod');
        $methods = $andreani->call('EnvioConParametros', ['codigoCliente' => 'CL0003750', 'fechaCreacionDesde' => '2018-01-01T00:00:00', 'fechaCreacionHasta' => '2018-06-30T23:59:59', 'idDeProducto' => 'aldanois9987', 'numeroDeDocumentoDestinatario' => null]);
        $this->assertTrue(gettype($methods) == 'array');
    }

    public function testCallSandroxEnvioConParametros(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'sandbox');
        $methods = $andreani->call('EnvioConParametros', ['codigoCliente' => 'CL0003750', 'fechaCreacionDesde' => '2018-01-01T00:00:00', 'fechaCreacionHasta' => '2018-06-30T23:59:59', 'idDeProducto' => 'aldanois9987', 'numeroDeDocumentoDestinatario' => null]);
        $this->assertTrue(gettype($methods) == 'array');
    }

    public function testCallSandroxCotizar(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'sandbox');
        $methods = $andreani->call('Cotizar', ["pais" => "Argentina", "codigoPostal" => "Argentina", "contrato" => "Argentina", "kilos" => "Argentina", "volumen" => "Argentina", "valorDeclarado" => "Argentina"]);
        $this->assertTrue(gettype($methods) == 'array');
    }

    public function testCallProdObtenerEtiquetaParaImprimir(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'prod');
        $methods = $andreani->call('ObtenerEtiquetaParaImprimir', null);
        $this->assertTrue(gettype($methods) == 'array');
    }

    public function testCallProdObtenerOrdenesDeEnvio(): void {
        $andreani = new Andreani('aol_ws', 'pKjr98!52v3', 'prod');
        $methods = $andreani->call('OrdenesDeEnvio', ["localidad" => "Argentina", "codigoPostal" => "Argentina", "bultosParaEnviar" => "Argentina", "componentesDeDireccion" => "Argentina", "contrato" => "Argentina", "kilos" => "Argentina", "valorDeclaradoConImpuesto" => "Argentina", "eMail" => "Argentina"]);
        var_dump($methods);
        exit;
        $this->assertTrue(gettype($methods) == 'array');
    }

    //////////////////// METHODS ////////////////////
    ////////////////////// END //////////////////////
}
