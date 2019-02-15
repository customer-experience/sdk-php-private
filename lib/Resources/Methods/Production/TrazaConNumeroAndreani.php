<?php

namespace Resources\Methods\Production;

use Resources\Methods\ProductionInterface;

class TrazaConNumeroAndreani implements ProductionInterface {
    
    public function getParameters() {
        return array("NumeroAndreani");
    }
    
}