<?php

namespace Mbrevda\Specification\Extractors;

use Mbrevda\Specification\Extractors\ExtractorInterface;

class Property implements ExtractorInterface
{
    protected $property;

    public function __construct($property)
    {
        $this->property = $property;
    }

    public function __invoke($candidate)
    {
        return $candidate->$property;
    }

    public function getName()
    {
        return $this->property;
    }
}
