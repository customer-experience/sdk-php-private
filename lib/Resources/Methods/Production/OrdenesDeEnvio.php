<?php

namespace Resources\Methods\Production;

use Resources\Methods\ProductionInterface;
use CurlManager;

class OrdenesDeEnvio implements ProductionInterface {

    public function getParameters() {
        return array("localidad", "region", "pais", "codigoPostal", "componentesDeDireccion" => array("meta" => "calle/numero", "contenido"), "nombres", "apellidos", "tipoYNumeroDeDocumento", "eMail", "contrato", "bultosParaEnviar" => array("kilos", "valorDeclaradoConImpuestos", "descripcion", "IdDeProducto", "largoCm", "altoCm", "anchoCm"));
    }

    public function callParameters($parameter, $autorizationToken, $url) {
        $curlManager = new CurlManager();

        if (array_key_exists('localidad', $parameter) && array_key_exists('codigoPostal', $parameter) && array_key_exists('bultosParaEnviar', $parameter) && array_key_exists('componentesDeDireccion', $parameter) && array_key_exists('contrato', $parameter)) {
            if (array_key_exists('eMail', $parameter) || (array_key_exists('nombres', $parameter) && array_key_exists('apellidos', $parameter))) {
                // Camino feliz
            } else {
                return "Faltan ingresar el Email o el Nombre y Apellido !";
            }
        } else {
            return "Faltan datos obligatorios";
        }

        $json = '{"destino": {"postal": {"localidad": "' . $parameter['localidad'] . '", "codigoPostal": "' . $parameter['codigoPostal'] . '" ';
        if (array_key_exists('region', $parameter)) {
            $json .= ', "region": "' . $parameter['region'] . '" ';
        }
        if (array_key_exists('pais', $parameter)) {
            $json .= ', "pais": "' . $parameter['pais'] . '" ';
        }
        $json .= ', "componentesDeDireccion": [';
        foreach ($parameter["componentesDeDireccion"] as $key => $componente) {
            $json .= '{"meta": "' . $componente["meta"] . '", "contenido": "' . $componente['contenido'] . '"},';
        }
        $json .= ']}}, "destinatario": {';
        if (array_key_exists('nombres', $parameter)) {
            $json .= '"nombres": "' . $parameter['nombres'] . '", ';
        }
        if (array_key_exists('apellidos', $parameter)) {
            $json .= '"apellidos": "' . $parameter['apellidos'] . '", ';
        }
        if (array_key_exists('tipoYNumeroDeDocumento', $parameter)) {
            $json .= '"tipoYNumeroDeDocumento": "' . $parameter['tipoYNumeroDeDocumento'] . '", ';
        }
        if (array_key_exists('pais', $parameter)) {
            $json .= '"pais": "' . $parameter['pais'] . '", ';
        }
        if (array_key_exists('eMail', $parameter)) {
            $json .= '"eMail": "' . $parameter['eMail'] . '", ';
        }
        $json .= '}, "contrato": "' . $parameter["contrato"] . '", "bultosParaEnviar": [{';
        foreach ($parameter["bultosParaEnviar"] as $bulto) {
            if (array_key_exists('kilos', $bulto)) {
                $json .= '"kilos": "' . $bulto['kilos'] . '", ';
            }
            if (array_key_exists('valorDeclaradoConImpuestos', $bulto)) {
                $json .= '"valorDeclaradoConImpuestos": "' . $bulto['valorDeclaradoConImpuestos'] . '", ';
            }
            if (array_key_exists('descripcion', $bulto)) {
                $json .= '"descripcion": "' . $bulto['descripcion'] . '", ';
            }
            if (array_key_exists('IdDeProducto', $bulto)) {
                $json .= '"IdDeProducto": "' . $bulto['IdDeProducto'] . '", ';
            }
            if (array_key_exists('largoCm', $bulto)) {
                $json .= '"largoCm": "' . $bulto['largoCm'] . '", ';
            }
            if (array_key_exists('altoCm', $bulto)) {
                $json .= '"altoCm": "' . $bulto['altoCm'] . '", ';
            }
            if (array_key_exists('anchoCm', $bulto)) {
                $json .= '"anchoCm": "' . $bulto['anchoCm'] . '", ';
            }
        }
        $json .= '}]}';

        return $curlManager->postJson($url . 'v1/ordenesDeEnvio', $json, array('Content-Type' => 'application/json', 'x-Authorization-token' => $autorizationToken), 'x-Authorization-token:' . $autorizationToken);
    }

}
