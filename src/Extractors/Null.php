<?php

namespace Mbrevda\Specification\Extractors;

use Mbrevda\Specification\Extractors\ExtractorInterface;

class Null implements ExtractorInterface
{
    public function __invoke($candidate)
    {
        return $candidate;
    }
}
