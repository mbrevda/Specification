<?php

namespace Mbrevda\Specification\Operators;

use \Mbrevda\Specification\SpecificationInterface;

class Equals implements SpecificationInterface
{
    private $argument;

    public function __construct($argument)
    {
        $this->argument = $argument;
    }

    public function isSatisfiedBy($candidate)
    {
        return $this->argument === $candidate;
    }

    public function selectSatisfying($ob, $candidate)
    {
        return $ob->equals($this->argument, $candidate);
    }
}
