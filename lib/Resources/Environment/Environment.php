<?php

abstract class Environment {
    
    function __construct() {
       $this->config = json_decode(file_get_contents(__DIR__ . '/config.json'));
   }
    
    abstract protected function getLogin();

    abstract protected function getMetodos();

}
