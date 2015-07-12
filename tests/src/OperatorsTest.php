<?php

namespace Mbrevda\Specification\Tests;

use \Mbrevda\Specification\Operators\Equals;
use \Mbrevda\Specification\Operators\Unequals;
use \Mbrevda\Specification\Extractors\Null;

class OpperatorsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->nullExtractor = new Null;
    }

    public function testEqualsTrue()
    {
        $equals = new Equals(2, $this->nullExtractor);

        $this->assertTrue($equals->isSatisfiedBy(2));
    }

    public function testEqualsFalse()
    {
        $equals = new Equals(3, $this->nullExtractor);

        $this->assertFalse($equals->isSatisfiedBy(2));
    }

    public function testUnequalsTrue()
    {
        $unequals = new Unequals(4, $this->nullExtractor);

        $this->assertTrue($unequals->isSatisfiedBy(5));
    }

    public function testUnequalsFalse()
    {
        $unequals = new Unequals(2, $this->nullExtractor);

        $this->assertFalse($unequals->isSatisfiedBy(2));
    }
}
