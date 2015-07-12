<?php

namespace Mbrevda\Specification\Operators;

use \Mbrevda\Specification\SpecificationInterface;

class Equals implements SpecificationInterface
{
    private $argument;

    public function __construct($argument, PropertyExtractor $extractor = null)
    {
        $this->argument = $argument;
    }

    public function isSatisfiedBy($candidate)
    {
        return $this->argument === $candidate;
    }

    public function selectSatisfying($ob)
    {
        return $ob->equals($this->argument);
    }
}
