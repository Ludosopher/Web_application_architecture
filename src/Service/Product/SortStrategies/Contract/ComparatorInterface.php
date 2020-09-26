<?php

declare(strict_types=1);

namespace Service\Product\SortStrategies\Contract;

interface ComparatorInterface
{
    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function compare($a, $b): int;
}