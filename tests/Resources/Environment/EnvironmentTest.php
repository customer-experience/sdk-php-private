<?php

use PHPUnit\Framework\TestCase;
use Resources\Environment\Production;
use Resources\Environment\Sandbox;

final class EnvironmentTest extends TestCase {

    public function testEnvironmentParametersProd(): void {
        $production = new Production();
        $array = $production->getMethodParameters();
        $this->assertEquals('array', gettype($array));
    }

    public function testEnvironmentParametersSandbox(): void {
        $sandbox = new Sandbox();
        $array = $sandbox->getMethodParameters();
        $this->assertEquals('array', gettype($array));
    }

}
