<?php

namespace Resources\Methods\Production;

use Resources\Methods\ProductionInterface;
use ApiClient;

class OrdenesDeEnvio implements ProductionInterface {

    public function getParameters() {
        return array();
    }

    public function callParameters($parameter, $autorizationToken, $url) {
        $apiClient = new ApiClient();
        return $apiClient->postJson($url . 'v1/ordenesDeEnvio', array('x-Authorization-token' => $autorizationToken), null, 'x-Authorization-token:' . $autorizationToken);
    }

}
