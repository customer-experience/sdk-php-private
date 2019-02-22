<?php

namespace Resources\Environment;

abstract class Environment {

    function __construct() {
        $this->methods = $this->getMethods();
        $this->classes = $this->getClasses();
    }

    abstract public function getLogin();

    abstract public function getURL();

    abstract public function getName();

    public function getMethods() {
        $metodos = scandir('lib/Resources/Methods/' . $this->getName());
        unset($metodos[0]);
        unset($metodos[1]);
        return array_map(function ($line) {
            return 'Resources\\Methods\\' . $this->getName() . '\\' . substr($line, 0, -4);
        }, $metodos);
    }

    public function getClasses() {
        return array_map(function ($class) {
            return new $class();
        }, $this->methods);
    }

    public function getMethodParameters() {
        $methodParameters = array();
        foreach ($this->classes as $key => $method) {
            $methodParameters[$key] = $method->getParameters();
        }
        return $methodParameters;
    }

    public function callMethod($method, $parameters, $autorizationToken) {
        $classname = 'Resources\\Methods\\' . $this->getName() . '\\' . $method;
        $class = new $classname();
        return $class->callParameters($parameters, $autorizationToken, $this->getURL());
    }

}
