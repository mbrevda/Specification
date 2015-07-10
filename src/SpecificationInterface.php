<?php

namespace Mbrevda\Specification;

interface Specification
{
    public function isSatisfiedBy($candidate);
    public function selectSatisfying($candidate);
}
