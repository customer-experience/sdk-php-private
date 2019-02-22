<?php

namespace Resources\Methods\Sandbox;

use Resources\Methods\SandboxInterface;
use CurlManager;

class EnvioConParametros implements SandboxInterface {

    public function getParameters() {
        return array("codigoCliente", "fechaCreacionDesde", "fechaCreacionHasta", "idDeProducto", "numeroDeDocumentoDestinatario");
    }

    public function callParameters($parameter, $autorizationToken, $url) {
        $curlManager = new CurlManager();
        $url .= 'v1/envios?';
        if ($parameter['codigoCliente'])
            $url .= 'codigoCliente' . '=' . $parameter['codigoCliente'] . '&';
        if ($parameter['fechaCreacionDesde'])
            $url .= 'fechaCreacionDesde' . '=' . $parameter['fechaCreacionDesde'] . '&';
        if ($parameter['fechaCreacionHasta'])
            $url .= 'fechaCreacionHasta' . '=' . $parameter['fechaCreacionHasta'] . '&';
        if ($parameter['idDeProducto'])
            $url .= 'idDeProducto' . '=' . $parameter['idDeProducto'] . '&';
        if ($parameter['numeroDeDocumentoDestinatario'])
            $url .= 'numeroDeDocumentoDestinatario' . '=' . $parameter['numeroDeDocumentoDestinatario'] . '&';

        return $curlManager->getJson($url, null, 'x-Authorization-token:' . $autorizationToken);
    }

}
