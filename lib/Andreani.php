<?php

class Andreani {

    protected $username;
    protected $password;
    protected $environment;

    public function __construct($username, $password, $environment = 'prod') {
        $this->username = $username;
        $this->password = $password;
        $this->environment = $environment == 'prod' ? 'Production' : 'Sandbox';
    }

    public function call(WebserviceRequest $consulta) {
        return 1;
    }

    protected function getAuthorizationToken() {
        $environment = new $this->environment();
        $url = $environment->getLogin();
        $apiClient = new ApiClient();
        $content = $apiClient->getJson($url);
        $authorizationToken = $content['ok'];
        return $authorizationToken;
    }

    public function getEnvironment() {
        return $this->environment;
    }

}
