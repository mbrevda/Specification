<?php

namespace Mbrevda\Specification\Extractors;

interface ExtractorInterface
{
    public function __invoke($candidate);
}
