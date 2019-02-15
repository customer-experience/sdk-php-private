<?php

namespace Resources\Methods\Sandbox;

use Resources\Methods\SandboxInterface;

class EnvioConParametros implements SandboxInterface {
    
    public function getParameters() {
        return array("NumeroAndreani", "Hola", "Como", "Va");
    }
    
}