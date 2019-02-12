<?php

use Resources\Requests\ApiClient;

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

    public function call() {
        return 1;
    }

    public function getAuthorizationToken() {
        $apiClient = new ApiClient();
        $url = $this->environment->getLogin();
        $content = $apiClient->getJson($url, null, "$this->username:$this->password");
        $authorizationToken = $content['header']['X-Authorization-token'];
        return $authorizationToken;
    }

    public function getMethods() {
        return $this->environment->getMethods();
    }

    public function getEnvironment() {
        return $this->environment->getName();
    }

}
