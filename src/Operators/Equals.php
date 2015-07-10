<?php

namespace Mbrevda\Specificaiton\Opperators;

use \Mbrevda\Specifcation\SpecificationInterface;

class Equals implements SpecificationInterface
{
    private $argument1;
    private $argument2;

    public function __construct($argument2)
    {
        $this->argument1 = $argument1;
        $this->argument2 = $argument2;
    }

    public function isSatisfiedBy()
    {
        return $this->argument1 === $this->arguemnt2;
    }
    
    public function selectSatisfying($ob)
    {
        return $ob->equals($this->argument1, $this->arguemnt2);
    }
}
