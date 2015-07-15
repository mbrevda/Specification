<?php

namespace Mbrevda\Specification\Tests;

use Mbrevda\Specification\Connectives\AndX;
use Mbrevda\Specification\Connectives\OrX;
use Mbrevda\Specification\Connectives\Not;
use Mbrevda\Specification\Connectives\Factory;
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
        $or = new OrX($one, $two);

        $this->assertTrue($or->isSatisfiedBy(2));
    }

    public function testNot()
    {
        $not = new Not($this->opFactory->equals(2));

        $this->assertTrue($not->isSatisfiedBy(3));
    }

    public function testChaining()
    {
        $equalsTwo = $this->opFactory->equals(2);
        $equalsThree = $this->opFactory->equals(2);
        $test = $equalsTwo
            ->orX($equalsTwo, $equalsThree)
            ->andX($equalsTwo, $equalsTwo);

        $this->assertTrue($test->isSatisfiedBy(2));
    }
}
