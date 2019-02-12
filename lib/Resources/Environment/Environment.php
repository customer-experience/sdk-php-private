<?php

namespace Resources\Environment;

abstract class Environment {
    
    function __construct() {
       $this->config = json_decode(file_get_contents(__DIR__ . '/../../config.json'));
   }
    
    abstract public function getLogin();

    abstract public function getMethods();
    
    abstract public function getName();

}
