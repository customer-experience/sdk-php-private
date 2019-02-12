<?php

namespace Resources\Environment;

class Sandbox extends Environment {

    public function getLogin() {
        return $this->config->sandbox->login;
    }

    public function getMethods() {
        return $this->config->production->methods;
    }

    public function getName() {
        return 'Sandbox';
    }

}
