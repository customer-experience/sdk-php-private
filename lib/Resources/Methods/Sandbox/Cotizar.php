<?php

namespace Resources\Methods\Sandbox;

use Resources\Methods\SandboxInterface;
use ApiClient;

class Cotizar implements SandboxInterface {

    public function getParameters() {
        return array("pais", "region", "localidad", "codigoPostal", "sucursalOrigen", "contrato", "kilos", "categoria", "altoCm", "largoCm", "anchoCm", "volumen", "valorDeclarado");
    }

    public function callParameters($parameter, $autorizationToken, $url) {
        $apiClient = new ApiClient();
        $url .= 'v1/tarifas?';

        if (!array_key_exists('pais', $parameter) || !array_key_exists('codigoPostal', $parameter) || !array_key_exists('contrato', $parameter) || !array_key_exists('volumen', $parameter) || !array_key_exists('valorDeclarado', $parameter)) {
            if (!array_key_exists('kilos', $parameter) && !array_key_exists('categoria', $parameter)) {
                return "Faltan ingresar kilos o categoría !";
            } else {
                return "Faltan datos obligatorios";
            }
        }

        $url .= 'Destino={"pais": "' . $parameter['pais'] . '", "codigoPostal": "' . $parameter['codigoPostal'] . '"';
        if (array_key_exists('localidad', $parameter))
            $url .= ', "localidad":"' . $parameter['pais'] . '"}&';
        else
            $url .= '}&';

        if (array_key_exists('sucursalOrigen', $parameter))
            $url .= 'sucursalOrigen=' . $parameter['sucursalOrigen'] . '&';

        $url .= 'contrato=' . $parameter['contrato'] . '&';

        $url .= 'Bulto={"volumen":"' . $parameter['contrato'] . '", "valorDeclarado":"' . $parameter['contrato'] . '"';

        if (array_key_exists('kilos', $parameter))
            $url .= ', "kilos": "' . $parameter['kilos'] . '"';
        if (array_key_exists('categoria', $parameter))
            $url .= ', "categoria": "' . $parameter['categoria'] . '"';
        if (array_key_exists('altoCm', $parameter))
            $url .= ', "altoCm": "' . $parameter['altoCm'] . '"';
        if (array_key_exists('largoCm', $parameter))
            $url .= ', "largoCm": "' . $parameter['largoCm'] . '"';
        if (array_key_exists('anchoCm', $parameter))
            $url .= ', "anchoCm": "' . $parameter['anchoCm'] . '"';

        $url .= '}';

        return $apiClient->getJson($url, null, 'x-Authorization-token:' . $autorizationToken);
    }

}
