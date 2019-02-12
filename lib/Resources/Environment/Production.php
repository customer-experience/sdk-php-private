<?php

namespace Resources\Environment;

class Production extends Environment {

    public function getLogin() {
        return $this->config->production->login;
    }

    public function getMetodos() {
        return $this->metodos;
    }

}
