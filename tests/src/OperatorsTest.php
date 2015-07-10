<?php

namespace Mbrevda\Specification\Tests;

use \Mbrevda\Specification\Operators\Equals;
use \Mbrevda\Specification\Operators\Unequals;

class OpperatorsTest extends \PHPUnit_Framework_TestCase
{
    public function testEqualsTrue()
    {
        $equals = new Equals(2);

        $this->assertTrue($equals->isSatisfiedBy(2));
    }
    
    public function testEqualsFalse()
    {
        $equals = new Equals(3);

        $this->assertFalse($equals->isSatisfiedBy(2));
    }
    
    public function testUnequalsTrue()
    {
        $equals = new Unequals(4);

        $this->assertTrue($equals->isSatisfiedBy(5));
    }
    
    public function testUnequalsFalse()
    {
        $equals = new Unequals(2);

        $this->assertFalse($equals->isSatisfiedBy(2));
    }
}
