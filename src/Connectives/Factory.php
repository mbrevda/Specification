<?php

namespace Mbrevda\Specification\Connectives;

use \Mbrevda\Specification\SpecificationInterface;
use \Mbrevda\Specification\Connectives\AndX;
use \Mbrevda\Specification\Connectives\OrX;
use \Mbrevda\Specification\Connectives\Not;

class Factory
{
    public function andX(
        SpecificationInterface $specification1,
        SpecificationInterface $specification2
    ) {
        return new AndX($specification1, $specification2);
    }

    public function orX(
        SpecificationInterface $specification1,
        SpecificationInterface $specification2
    ) {
        return new OrX($specification1, $specification2);
    }

    public function not(SpecificationInterface $specification)
    {
        return new Not($specification);
    }
}
