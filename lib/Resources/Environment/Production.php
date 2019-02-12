<?php

namespace Resources\Environment;

class Production extends Environment {

    public function getLogin() {
        return $this->config->production->login;
    }

    public function getMethods() {
        return $this->config->production->methods;
    }

    public function getName() {
        return 'Production';
    }

}
