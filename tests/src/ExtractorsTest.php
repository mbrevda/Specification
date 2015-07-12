<?php

namespace Mbrevda\Specification\Tests;

use \Mbrevda\Specification\Extractors\Null;

include_once(__DIR__ . '/../Ob.php');

class ExtractorsTest extends \PHPUnit_Framework_TestCase
{
    public function testNull()
    {
        $n = new Null;
        $this->assertEquals('foo', $n->__invoke('foo'));
    }
}
