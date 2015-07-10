<?php

namespace Mbrevda\Specification\Conectives;

use \Mbrevda\Specification\SpecificationInterface;
use \Mbrevda\Specification\Conectives\Factory;

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
