<?php

namespace Resources\Environment;

class Sandbox extends Environment {

    protected function getLogin() {
        return $this->url;
    }

    protected function getMetodos() {
        return $this->metodos;
    }

}
