<?php

namespace Resources\Environment;

class Production extends Environment {

    const LOGIN = 'https://api.andreani.com/login';

    public function getLogin() {
        return self::LOGIN;
    }

    public function getName() {
        return 'Production';
    }

}
