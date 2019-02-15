<?php

namespace Resources\Environment;

class Sandbox extends Environment {

    public function getLogin() {
        return $this->config->sandbox;
    }

    public function getMethods() {
        return array();
    }

    public function getName() {
        return 'Sandbox';
    }

}
