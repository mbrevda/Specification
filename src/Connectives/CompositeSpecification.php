<?php

namespace Mbrevda\Specification\Connectives;

use \Mbrevda\Specification\SpecificationInterface;
use \Mbrevda\Specification\Connectives\AndX;
use \Mbrevda\Specification\Connectives\OrX;
use \Mbrevda\Specification\Connectives\Not;

abstract class CompositeSpecification implements SpecificationInterface
{

    public function andX(
        SpecificationInterface $specification1,
        SpecificationInterface $specification2 = null
    ) {
        return new AndX($this, $specification1);
    }

    public function orX(
        SpecificationInterface $specification1,
        SpecificationInterface $specification2 = null
    ) {
        return $specification2
            ? new OrX($specification1, $specification2)
            : new OrX($this, $specification1);
    }

    public function not(SpecificationInterface $specification)
    {
        return new Not($specification);
    }
}
