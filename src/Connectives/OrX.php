<?php

namespace Mbrevda\Specification\Connectives;

use \Mbrevda\Specification\Connectives\CompositeSpecification;
use \Mbrevda\Specification\SpecificationInterface;

class OrX extends CompositeSpecification
{
    private $specification1;
    private $specification2;

    public function __construct(
        SpecificationInterface $specification1,
        SpecificationInterface $specification2
    ) {
        $this->specification1 = $specification1;
        $this->specification2 = $specification2;
    }

    public function isSatisfiedBy($candidate)
    {
        return $this->specification1->isSatisfiedBy($candidate)
            || $this->specification2->isSatisfiedBy($candidate);
    }

    public function selectSatisfying($ob)
    {
        return $ob->orX($this->specification1, $this->specification2);
    }
}
