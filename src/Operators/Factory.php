<?php

namespace Mbrevda\Specification\Operators;

use \Mbrevda\Specification\Extractors\ExtractorInterface;
use \Mbrevda\Specification\Extractors\Null as NullExtractor;
use \Mbrevda\Specification\Operators\Equals;
use \Mbrevda\Specification\Operators\Unequals;

class Factory
{
    public function equals($value, ExtractorInterface $extractor = null)
    {
        $extractor = $extractor ? $extractor : new NullExtractor;
        return new Equals($value, $extractor);
    }

    public function unequals($value, ExtractorInterface $extractor = null)
    {
        $extractor = $extractor ? $extractor : new NullExtractor;
        return new Unequals($value, $extractor);
    }
}
