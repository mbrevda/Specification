<?php

namespace Mbrevda\Specification\Connectives;

use \Mbrevda\Specification\Connectives\CompositeSpecification;
use \Mbrevda\Specification\SpecificationInterface;

class AndX extends CompositeSpecification
{
    public function __construct() {
        foreach (func_get_args() as $spec) {
            $this->andX($spec);
        }
    }
}
