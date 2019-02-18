<?php

namespace Resources\Environment;

class Production extends Environment {

    const URL = 'https://api.andreani.com/';

    public function getLogin() {
        return self::URL . 'login';
    }

    public function getURL() {
        return self::URL;
    }

    public function getName() {
        return 'Production';
    }

}
