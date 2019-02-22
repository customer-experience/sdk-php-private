<?php

namespace Resources\Methods\Production;

use Resources\Methods\ProductionInterface;
use CurlManager;

class EnvioConNumeroAndreani implements ProductionInterface {

    public function getParameters() {
        return array("NumeroAndreani");
    }

    public function callParameters($parameter, $autorizationToken, $url) {
        $curlManager = new CurlManager();
        return $curlManager->getJson($url . 'v1/envios/' . $parameter['NumeroAndreani'], array('x-Authorization-token' => $autorizationToken), null);
    }

}
