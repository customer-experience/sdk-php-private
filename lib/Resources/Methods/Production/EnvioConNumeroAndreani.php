<?php

namespace Resources\Methods\Production;

use Resources\Methods\ProductionInterface;
use ApiClient;

class EnvioConNumeroAndreani implements ProductionInterface {

    public function getParameters() {
        return array("NumeroAndreani");
    }

    public function callParameters($parameter, $autorizationToken, $url) {
        $apiClient = new ApiClient();
        return $apiClient->getJson($url . 'v1/envios/' . $parameter, null, 'x-Authorization-token:' . $autorizationToken);
    }

}
