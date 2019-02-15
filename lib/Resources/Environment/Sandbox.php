<?php

namespace Resources\Environment;

class Sandbox extends Environment {

    const LOGIN = 'https://api.qa.andreani.com/login';

    public function getLogin() {
        return self::LOGIN;
    }

    public function getName() {
        return 'Sandbox';
    }

}
