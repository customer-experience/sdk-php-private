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
        $index = $consulta->getWebserviceIndex();
        $configuration = $this->configuration->$index;
        $expose = true;

        return $this->connection->call($configuration, $this->argumentConverter->getArgumentChain($consulta), $expose);
    }

    protected function getAuthorizationToken() {
        $environment = new $this->environment();
        $url = $environment->getUrl();
        
        return $authorizationToken;
    }
    
    public function getEnvironment() {
        return $this->environment;
    }

}
