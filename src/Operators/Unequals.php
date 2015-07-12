<?php

namespace Mbrevda\Specification\Operators;

use \Mbrevda\Specification\SpecificationInterface;
use \Mbrevda\Specification\Extractors\ExtractorInterface;

class Unequals implements SpecificationInterface
{
    private $argument;
    private $extractor;

    public function __construct($argument, ExtractorInterface $extractor)
    {
        $this->argument = $argument;
        $this->extractor = $extractor;
    }

    public function isSatisfiedBy($candidate)
    {
        return $this->argument !== $this->extractor->__invoke($candidate);
    }

    public function selectSatisfying($ob)
    {
        return $ob->unequals($this->argument);
    }
}
