<?php

namespace Mbrevda\Specification\Connectives;

use \Mbrevda\Specification\SpecificationInterface;
use \Mbrevda\Specification\Connectives\Factory;

abstract class CompositeSpecification implements SpecificationInterface
{
    protected $factory;

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    public function andX(SpecificationInterface $specification)
    {
        return $this->factory->andX($this, $specification);
    }

    public function orX(SpecificationInterface $specification)
    {
        return $this->factory->orX($this, $specification);
    }

    public function not(SpecificationInterface $specification)
    {
        return $this->factory->orX($this);
    }
}
