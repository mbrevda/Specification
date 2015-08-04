<?php

namespace Mbrevda\Specification\Connectives;

use \Mbrevda\Specification\SpecificationInterface;
use \Mbrevda\Specification\Connectives\AndX;
use \Mbrevda\Specification\Connectives\OrX;
use \Mbrevda\Specification\Connectives\Not;

class CompositeSpecification implements SpecificationInterface
{
    private $stack = [
        [
            'type' => 'AND',
            'specs' => []
        ]
    ];
    private $currentType = 'AND';
    private $index = 0;

    public function andX($spec) {
        if ($this->currentType != 'AND') {
            $this->currentType = 'AND';
            $this->stack[] = ['type' => 'AND', 'specs' => []];
            $this->index++;
        }

        $this->stack[$this->index]['specs'][] = $spec;

        return $this;


        /*return $specification2
            ? new AndX($specification1, $specification2)
            : new AndX($this, $specification1);
        */

    }

    public function orX($spec) {
        if ($this->currentType != 'OR') {
            $this->currentType = 'OR';
            $this->stack[] = ['type' => 'OR', 'specs' => []];
            $this->index++;
        }

        $this->stack[$this->index]['specs'][] = $spec;

        return $this;



        /*return $specification2
            ? new OrX($specification1, $specification2)
            : new OrX($this, $specification1);
        */
    }

    public function not(SpecificationInterface $specification)
    {
        return new Not($specification);
    }

    public function isSatisfiedBy($candidate)
    {
        foreach ($this->stack as $spec) {
            if(!$spec->isSatisfiedBy($candidate)) {
                return false;
            }
        }

        return true;
    }

    public function selectSatisfying($ob) {
        if (!$this->stack) {
            return $ob;
        }

        foreach ($this->stack as $conectiveCollection) {
            /*$specs = array_map(function($spec) use ($ob){
                return $spec->selectSatisfying($ob);
            }, $conectiveCollection['specs']);*/
            $specs = [];
            foreach ($conectiveCollection['specs'] as $conective) {
                if (get_class($this) == 'UserSpec' and get_class( $conective) == 'Mbrevda\Specification\Connectives\AndX') {
                    echo get_class($conective).'->selectSatisfying('.get_class($ob).')' . PHP_EOL;
                }
                $x = $conective->selectSatisfying($ob);
                if (get_class($this) == 'UserSpec' && get_class($conective) == 'Mbrevda\Specification\Connectives\AndX') {
                    echo '   = returns ' . get_class($x) . PHP_EOL;
                    //print_r(['not' => $this]);
                } else {
                    $specs[] = $x;
                }

                /*if (!isset($x->isTop) || !$x->isTop) {
                    $specs[] = $x;
                }*/

            }



            if (!$specs) {
                continue;
            }

            switch ($conectiveCollection['type']) {
                case 'AND':
                    $ob->andX($specs);
                    break;
                case 'OR':
                    $ob->orX($specs);
                    break;
                case 'NOT':
                    break;
            }
        }

        return $ob;
    }
}
/*
$spec = $userSpec
    ->andX(new Equals('true', new Property('active')))
    ->andX(new Equals('true', new Property('member')))
    ->andX(
        new AndX(
            new Equals('Charlie', new Property('firstName')),
            new Equals('Brown', new Property('lastName'))
        )
    )
    ->orX(
        new AndX(
            new Equals('Charlie', new Property('firstName')),
            new Equals('Brown', new Property('lastName'))
        )
    );
$stack = [
    [
        'type' => 'AND',
        'specs' => [
            new Equals('true', new Property('active')),
            new Equals('true', new Property('member')),
            new AndX()
        ]
    ],
    [
        'type' => 'OR',
        'specs' => [
            new AndX()
        ]
    ]
];

$userQuery WHERE
    (active = true and memeber = true and ($andx) OR ($andX2))
*/
