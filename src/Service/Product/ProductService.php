<?php

declare(strict_types = 1);

namespace Service\Product;

use Model;
use Model\Entity\Product;
use Model\Repository\ProductRepository;
use Service\Product\SortStrategies\Comparator\NameComparator;
use Service\Product\SortStrategies\Comparator\PriceComparator;
use Service\Product\SortStrategies\Service\ProductSorter;
use Service\Product\SortStrategies\Contract\ComparatorInterface;


class ProductService
{
    /**
     * Получаем информацию по конкретному продукту
     * @param int $id
     * @return Product|null
     */
    public function getInfo(int $id): ?Product
    {
        $product = $this->getProductRepository()->search([$id]);
        return count($product) ? $product[0] : null;
    }

    /**
     * Получаем все продукты
     * @param string $sortType
     * @return Product[]
     */
    public function getAll(string $sortType): array
    {
        $productList = $this->getProductRepository()->fetchAll();

        return $this->sort($productList, $sortType);
    }

    /**
     * Метод сортировки товаров в зависимости от заданного критерия
     * @param array $productList
     * @param string $sortType
     * @return array
     */
    private function sort(array $productList, string $sortType): array
    {
        switch ($sortType) {
            case 'name':
                $comparator = new NameComparator();
                break;
            case 'price':
                $comparator = new PriceComparator();
                break;
        }
        $sorter = new ProductSorter($comparator);
        return $sorter->sort($productList);
    }

    /**
     * Фабричный метод для репозитория Product
     * @return ProductRepository
     */
    protected function getProductRepository(): ProductRepository
    {
        return new ProductRepository();
    }
}
