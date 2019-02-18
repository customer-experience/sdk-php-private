<?php

namespace Resources\Environment;

class Sandbox extends Environment {

    const URL = 'https://api.qa.andreani.com/';

    public function getLogin() {
        return self::URL . 'login';
    }
    
    public function getURL() {
        return self::URL;
    }
    
    public function getName() {
        return 'Sandbox';
    }

}
