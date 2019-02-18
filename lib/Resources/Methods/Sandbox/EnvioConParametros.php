<?php

namespace Resources\Methods\Sandbox;

use Resources\Methods\SandboxInterface;

class EnvioConParametros implements SandboxInterface {

    public function getParameters() {
        return array("codigoCliente", "fechaCreacionDesde", "fechaCreacionHasta", "idDeProducto", "numeroDeDocumentoDestinatario");
    }

    public function callParameters($parameter, $autorizationToken, $url) {
        $apiClient = new ApiClient();
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

        return $apiClient->getJson($url, null, 'x-Authorization-token:' . $autorizationToken);
    }

}
