<?php

namespace Mbrevda\Specification\Connectives;

use \Mbrevda\Specification\Connectives\CompositeSpecification;
use \Mbrevda\Specification\SpecificationInterface;

class OrX extends CompositeSpecification
{
    public function __construct() {
        foreach (func_get_args() as $spec) {
            $this->orX($spec);
        }
    }
}
