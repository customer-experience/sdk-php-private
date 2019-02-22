<?php

namespace Resources\Methods\Production;

use Resources\Methods\ProductionInterface;
use CurlManager;

class OrdenesDeEnvio implements ProductionInterface {

    public function getParameters() {
        return array();
    }

    public function callParameters($parameter, $autorizationToken, $url) {
        $curlManager = new CurlManager();
        return $curlManager->postJson($url . 'v1/ordenesDeEnvio', array('x-Authorization-token' => $autorizationToken), null, 'x-Authorization-token:' . $autorizationToken);
    }

}
