<?php

namespace Mbrevda\Specification\Extractors;

use \Mbrevda\Specification\Extractors\ExtractorInterface;
use \Mbrevda\Specification\Extractors\Null;
use \Mbrevda\Specification\Extractors\Property;

class Factory
{
    public function null()
    {
        return new Null;
    }

    public function property($property)
    {
        return new Property($property);
    }
}
