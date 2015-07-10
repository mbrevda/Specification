<?php

namespace Mbrevda\Soecification\Conectives;

use \Mbrevda\Specification\SpecificationInterface;
use \Mbrevda\Specification\Conectives\AndX;
use \Mbrevda\Specification\Conectives\OrX;
use \Mbrevda\Specification\Conectives\Not;

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
