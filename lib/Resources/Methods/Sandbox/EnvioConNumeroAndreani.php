<?php

namespace Resources\Methods\Sandbox;

use Resources\Methods\SandboxInterface;
use CurlManager;

class EnvioConNumeroAndreani implements SandboxInterface {

    public function getParameters() {
        return array("NumeroAndreani");
    }

    public function callParameters($parameter, $autorizationToken, $url) {
        $curlManager = new CurlManager();
        return $curlManager->getJson($url . 'v1/envios/' . $parameter['NumeroAndreani'], null, 'x-Authorization-token:' . $autorizationToken);
    }

}
