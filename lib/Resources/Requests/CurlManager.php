<?php

namespace Resources\Requests;

class CurlManager {

    public function __construct() {
        $this->curl = null;
    }

    public function initCurl() {
        $this->curl = curl_init();
        return $this->curl;
    }

    public function closeCurl() {
        curl_close($this->curl);
        $this->curl = null;
    }

    public function getCurl() {
        return $this->curl ? $this->curl : $this->initCurl();
    }

    public function getJson($url, $headersArray, $USERPWD) {
        $this->initCurl();
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 7);
        curl_setopt($this->curl, CURLOPT_VERBOSE, 0);
        curl_setopt($this->curl, CURLOPT_USERPWD, $USERPWD);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->curl, CURLOPT_HEADER, 1);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        if ($headersArray)
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->convertHeadersArrayToHeader($headersArray));
        $oauth = curl_exec($this->curl);
        $code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        $headerSize = curl_getinfo($this->curl, CURLINFO_HEADER_SIZE);
        $header = substr($oauth, 0, $headerSize);
        $body = substr($oauth, $headerSize);
        $this->closeCurl();

        return array("code" => $code, "body" => $body, "header" => $this->getHeadersFromResponse($header));
    }

    public function postJson($url, $data, $headersArray) {
        $this->initCurl();
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 7);
        curl_setopt($this->curl, CURLOPT_VERBOSE, 0);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->curl, CURLOPT_HEADER, 1);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_POST, 1);
        if ($headersArray)
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->convertHeadersArrayToHeader($headersArray));
        if ($data)
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
        $oauth = curl_exec($this->curl);
        $code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        $headerSize = curl_getinfo($this->curl, CURLINFO_HEADER_SIZE);
        $header = substr($oauth, 0, $headerSize);
        $body = substr($oauth, $headerSize);
        $this->closeCurl();
        return array("code" => $code, "body" => $body, "header" => $this->getHeadersFromResponse($header));
    }

    public function putJson($url, $data, $headersArray) {
        $this->initCurl();
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 7);
        curl_setopt($this->curl, CURLOPT_VERBOSE, 0);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->curl, CURLOPT_HEADER, 1);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        if ($headersArray)
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->convertHeadersArrayToHeader($headersArray));
        if ($data)
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
        $code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        $oauth = curl_exec($this->curl);
        $headerSize = curl_getinfo($this->curl, CURLINFO_HEADER_SIZE);
        $header = substr($oauth, 0, $headerSize);
        $body = substr($oauth, $headerSize);
        $this->closeCurl();
        return array("code" => $code, "body" => $body, "header" => $this->getHeadersFromResponse($header));
    }

    public function deleteJson($url, $headersArray) {
        $this->initCurl();
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 7);
        curl_setopt($this->curl, CURLOPT_VERBOSE, 0);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->curl, CURLOPT_HEADER, 1);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        if ($headersArray)
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->convertHeadersArrayToHeader($headersArray));
        $code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        $oauth = curl_exec($this->curl);
        $headerSize = curl_getinfo($this->curl, CURLINFO_HEADER_SIZE);
        $header = substr($oauth, 0, $headerSize);
        $body = substr($oauth, $headerSize);
        $this->closeCurl();
        return array("code" => $code, "body" => $body, "header" => $this->getHeadersFromResponse($header));
    }

    private function getHeadersFromResponse($response) {
        $headers = array();
        foreach (explode("\r\n", substr($response, 0, strpos($response, "\r\n\r\n"))) as $key => $line) {
            if ($key == 0) {
                $headers['http_code'] = $line;
            } else {
                list ($k, $v) = explode(': ', $line);
                $headers[$k] = $v;
            }
        }
        return $headers;
    }

    private function convertHeadersArrayToHeader($headersArray) {
        $headers = array();
        if (is_array($headersArray)) {                                // Y SI NO ES ARRAY ??
            foreach ($headersArray as $key => $value) {
                $headers[] = "$key: $value";
            }
        }
        return $headers;
    }

}
