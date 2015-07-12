<?php

namespace Mbrevda\Specification\Tests;

use Mbrevda\Specification\Conectives\AndX;
use Mbrevda\Specification\Conectives\OrX;
use Mbrevda\Specification\Conectives\Not;
use Mbrevda\Specification\Conectives\Factory;
use Mbrevda\Specification\Operators\Factory as OpFactory;

class ConnectivesTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->opFactory = new OpFactory;
    }

    public function testAndX()
    {
        $one = $this->opFactory->equals(2);
        $two = $this->opFactory->unequals(3);
        $and = new AndX($one, $two);

        $this->assertTrue($and->isSatisfiedBy(2));
    }

    public function testOrX()
    {
        $one = $this->opFactory->equals(2);
        $two = $this->opFactory->unequals(3);
        $and = new OrX($one, $two);

        $this->assertTrue($and->isSatisfiedBy(2));
    }

    public function testNot()
    {
        $and = new Not($this->opFactory->equals(2));

        $this->assertTrue($and->isSatisfiedBy(3));
    }
}
