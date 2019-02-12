<?php

namespace Resources\Environment;

class Sandbox extends Environment {

    public function getLogin() {
        return $this->config->sandbox->login;
    }

    public function getMetodos() {
        return $this->metodos;
    }

}
