<?php

declare(strict_types=1);

namespace Service\Product\SortStrategies\Service;

use Model\Entity\Product;
use Model\Repository\ProductRepository;
use Service\Product\SortStrategies\Contract\ComparatorInterface;

class ProductSorter
{
    /**
     * @var ComparatorInterface
     */
    private $comparator;

    /**
     * OrderSorter constructor.
     * @param ComparatorInterface $comparator
     */
    public function __construct(ComparatorInterface $comparator)
    {
        $this->comparator = $comparator;
    }

    /**
     * @param ProductRepository[] $products
     * @return ProductRepository[]
     */
    public function sort(array $products): array
    {
        usort($products, [$this->comparator, 'compare']);

        return $products;
    }
}