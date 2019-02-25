<?php

namespace Resources\Methods\Production;

use Resources\Methods\ProductionInterface;
use CurlManager;

class OrdenesDeEnvio implements ProductionInterface {

    public function getParameters() {
        return array("localidad", "region", "pais", "codigoPostal", "componentesDeDireccion" => array("meta" => "calle/numero", "contenido"), "nombres", "apellidos", "tipoYNumeroDeDocumento", "email", "contrato", "bultosParaEnviar" => array("kilos", "valorDeclaradoConImpuesto", "descripcionPaquete", "IDdeProducto", "largoCM", "altoCM", "anchoCM"));
    }

    /*
     *
     * Region
     * Pais
     * kilos
     * valorDeclaradoConImpuestos
     * EMAIL o NOMBREAPELLIDO
     * dni
     * descripcion
     * id
     * anchoi
     * largo
     * alto
     * 
     */

    public function callParameters($parameter, $autorizationToken, $url) {
        $curlManager = new CurlManager();

        if (array_key_exists('localidad', $parameter) && array_key_exists('codigoPostal', $parameter) && array_key_exists('bultosParaEnviar', $parameter) && array_key_exists('componentesDeDireccion', $parameter) && array_key_exists('contrato', $parameter) && array_key_exists('kilos', $parameter) && array_key_exists('valorDeclaradoConImpuesto', $parameter)) {
            if (array_key_exists('email', $parameter) || (array_key_exists('nombres', $parameter) && array_key_exists('apellidos', $parameter))) {
                // Camino feliz
            } else {
                return "Faltan ingresar el Email o el Nombre y Apellido !";
            }
        } else {
            return "Faltan datos obligatorios";
        }


        $json = '"destino": {"postal": {"localidad": "' . $parameter['localidad'] . '", "codigoPostal": "' . $parameter['codigoPostal'] . '" ';
        if ($parameter['region']) {
            $json .= ', "region": "' . $parameter['region'] . '" ';
        }
        if ($parameter['pais']) {
            $json .= ', "pais": "' . $parameter['pais'] . '" ';
        }
        $json .= ', "componentesDeDireccion": [';
        foreach ($parameter["componentesDeDireccion"] as $componente) {
            $json .= '{"meta": "' . $componente['meta'] . '", "contenido": "' . $componente['contenido'] . '"},';
        }
        $json .= ']}}, "destinatario": {';
        if ($parameter['nombres']) {
            $json .= ', "nombres": "' . $parameter['nombres'] . '" ';
        }
        if ($parameter['apellidos']) {
            $json .= ', "apellidos": "' . $parameter['apellidos'] . '" ';
        }
        if ($parameter['tipoYNumeroDeDocumento']) {
            $json .= ', "tipoYNumeroDeDocumento": "' . $parameter['tipoYNumeroDeDocumento'] . '" ';
        }
        if ($parameter['email']) {
            $json .= ', "pais": "' . $parameter['pais'] . '" ';
        }
        if ($parameter['eMail']) {
            $json .= ', "eMail": "' . $parameter['eMail'] . '" ';
        }
        $json .= '}, "contrato": "' . $parameter["contrato"] . '", "bultosParaEnviar": [{';
        foreach ($parameter["bultosParaEnviar"] as $bulto) {
            $json .= '{';
            if ($bulto['kilos']) {
                $json .= ', "kilos": "' . $bulto['kilos'] . '" ';
            }
            if ($bulto['valorDeclaradoConImpuestos']) {
                $json .= ', "valorDeclaradoConImpuestos": "' . $bulto['valorDeclaradoConImpuestos'] . '" ';
            }
            if ($bulto['descripcion']) {
                $json .= ', "descripcion": "' . $bulto['descripcion'] . '" ';
            }
            if ($bulto['IdDeProducto']) {
                $json .= ', "IdDeProducto": "' . $bulto['IdDeProducto'] . '" ';
            }
            if ($bulto['largoCm']) {
                $json .= ', "largoCm": "' . $bulto['largoCm'] . '" ';
            }
            if ($bulto['altoCm']) {
                $json .= ', "altoCm": "' . $bulto['altoCm'] . '" ';
            }
            if ($bulto['anchoCm']) {
                $json .= ', "anchoCm": "' . $bulto['anchoCm'] . '" ';
            }
            $json .= '}';
        }
        $json .= ']}';

        var_dump($json);
        exit;

        return $curlManager->postJson($url . 'v1/ordenesDeEnvio', $json, array('Content-Type' => 'application/json', 'x-Authorization-token' => $autorizationToken), 'x-Authorization-token:' . $autorizationToken);
    }

}
