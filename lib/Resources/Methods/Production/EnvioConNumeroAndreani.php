<?php

namespace Resources\Methods\Production;

use Resources\Methods\ProductionInterface;

class EnvioConNumeroAndreani implements ProductionInterface {

    public function getParameters() {
        return array("NumeroAndreani");
    }

    public function callParameters($parameters, $autorizationToken, $login) {
        $apiClient = new ApiClient();
        return $apiClient->getJson($login, $parameters, array('x-Authorization-token' => $autorizationToken));
    }

}
