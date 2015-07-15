<?php

namespace Mbrevda\Specification\Connectives;

use \Mbrevda\Specification\Connectives\CompositeSpecification;
use \Mbrevda\Specification\SpecificationInterface;

class Not extends CompositeSpecification
{
    private $specification;

    public function __construct(SpecificationInterface $specification)
    {
        $this->specification = $specification;
    }

    public function isSatisfiedBy($candidate)
    {
        return !$this->specification->isSatisfiedBy($candidate);
    }

    public function selectSatisfying($ob)
    {
        return $ob->not($this->specification);
    }
}
