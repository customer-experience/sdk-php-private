<?php

namespace Resources\Methods\Production;

use Resources\Methods\ProductionInterface;
use ApiClient;

class ObtenerEtiquetaParaImprimir implements ProductionInterface {

    public function getParameters() {
        return array();
    }

    public function callParameters($parameter, $autorizationToken, $url) {
        $apiClient = new ApiClient();
        return $apiClient->getJson($url . 'v1/etiquetas', array('x-Authorization-token' => $autorizationToken), null);
    }

}
