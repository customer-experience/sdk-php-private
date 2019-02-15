<?php

namespace Resources\Environment;

class Production extends Environment {

    public function getLogin() {
        return $this->config->production;
    }

    public function getMethods() {
        return array();
    }

    public function getName() {
        return 'Production';
    }

}
