<?php

namespace Resources\Requests;

use Resources\Requests\CurlManager;

class ApiClient extends CurlManager {

    public function getEntity($url, $headersArray = null, $USERPWD) {
        return $this->getJson($url, $headersArray);
    }

    public function postEntity($url, $data = null, $headersArray = null) {
        return $this->postJson($url, $data, $headersArray);
    }

    public function putEntity($url, $data = null, $headersArray = null) {
        return $this->putJson($url, $data, $headersArray);
    }

    public function deleteEntity($url, $headersArray = null) {
        return $this->deleteJson($url, $headersArray);
    }
    
    /*
     * {Headers array example}
     * 
     * ['Content-Type'] => 'application/xml',
     * ['Accept'] => 'application/json',
     * ...
     * 
     */

}
