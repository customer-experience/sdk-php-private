<?php

use Resources\Requests\ApiClient;

class Andreani {

    protected $username;
    protected $password;
    protected $environment;

    public function __construct($username, $password, $environment = 'prod') {
        $this->username = $username;
        $this->password = $password;
        $this->environment = $environment == 'prod' ? 'Production' : 'Sandbox';
    }

    public function call() {
        return 1;
    }

    public function getAuthorizationToken() {
        $apiClient = new ApiClient();
        $environment = $this->getEnvironmentClass();
        $url = $environment->getLogin();
        $content = $apiClient->getJson($url, null, "$this->username:$this->password");
        $authorizationToken = $content['header']['X-Authorization-token'];
        return $authorizationToken;
    }

    public function getEnvironment() {
        return $this->environment;
    }

    protected function getEnvironmentClass() {
        $environmentClassName = '\\Resources\\Environment\\' . $this->environment;
        return new $environmentClassName() ;
    }

}
