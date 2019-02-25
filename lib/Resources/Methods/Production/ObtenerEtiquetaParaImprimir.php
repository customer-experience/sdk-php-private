<?php

namespace Resources\Methods\Production;

use Resources\Methods\ProductionInterface;
use CurlManager;

class ObtenerEtiquetaParaImprimir implements ProductionInterface {

    public function getParameters() {
        return array("NumeroDeOrden");
    }

    public function callParameters($parameter, $autorizationToken, $url) {
        $curlManager = new CurlManager();
        return $curlManager->getJson($url . 'v1/etiquetas/' . $parameter, array('x-Authorization-token' => $autorizationToken), null);
    }

}
