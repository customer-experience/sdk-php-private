<?php

class Andreani {

    protected $username;
    protected $password;
    protected $environment;

    public function __construct($username, $password, $environment = 'prod') {
        $this->username = $username;
        $this->password = $password;
        $environmentClassName = '\\Resources\\Environment\\' . ($environment == 'prod' ? 'Production' : 'Sandbox');
        $this->environment = new $environmentClassName();
    }

    public function call($method, $parameters) {
        $autorizationToken = $this->getAuthorizationToken();
        $response = $this->environment->callMethod($method, $parameters, $autorizationToken);
        return $response;
    }

    public function getConfiguration() {
        return $this->getMethodParameters();
    }

    public function getAuthorizationToken() {
        $apiClient = new ApiClient();
        $url = $this->environment->getLogin();
        $content = $apiClient->getJson($url, null, "$this->username:$this->password");
        $authorizationToken = $content['header']['X-Authorization-token'];
        return $authorizationToken;
    }

    public function getMethodParameters() {
        return $this->environment->getMethodParameters();
    }

    public function getMethods() {
        return $this->environment->getMethods();
    }

    public function getEnvironment() {
        return $this->environment->getName();
    }

}
