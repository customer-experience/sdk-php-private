<?php

namespace Resources\Environment;

class Production extends Environment {

    protected function getLogin() {
        return $this->config->production->login;
    }

    protected function getMetodos() {
        return $this->metodos;
    }

}
