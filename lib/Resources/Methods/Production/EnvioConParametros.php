<?php

namespace Resources\Methods\Production;

use Resources\Methods\ProductionInterface;

class EnvioConParametros implements ProductionInterface {

    public function getParameters() {
        return array("NumeroAndreani", "Hola", "Como", "Va");
    }

    public function callParameters($parameters, $autorizationToken, $login) {
        return array($parameters, $autorizationToken, $login);
    }

}
