<?php

declare(strict_types=1);

namespace Service\Product\SortStrategies\Comparator;

use Model\Entity\Product;
use Service\Product\SortStrategies\Contract\ComparatorInterface;

class NameComparator implements ComparatorInterface
{
    /**
     * @param Product $a
     * @param Product $b
     * @return int
     */
    public function compare($a, $b): int
    {
        return $a->getName() <=> $b->getName();
    }
}