<?php

namespace Resources\Methods\Sandbox;

use Resources\Methods\SandboxInterface;

class TrazaConNumeroAndreani implements SandboxInterface {

    public function getParameters() {
        return array("NumeroAndreani");
    }

    public function callParameters($parameter, $autorizationToken, $url) {
        $apiClient = new ApiClient();
        return $apiClient->getJson($url . 'v1/envios/' . $parameter['NumeroAndreani'] . '/trazas', null, 'x-Authorization-token:' . $autorizationToken);
    }

}
