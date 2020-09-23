<?php

/* Task 1
 Использование фабричного метода было обнаружено в "Service\Product\ProductService.php" в классе ProductService методе getinfo() (строка 18):

public function getInfo(int $id): ?Product
{
    $product = $this->getProductRepository()->search([$id]);
    return count($product) ? $product[0] : null;
}

 Здесь метод "getProductRepository()" этого же класса представляет собой фабрику экземпляров класса ProductRepository():

protected function getProductRepository(): ProductRepository
    {
        return new ProductRepository();
    }

Кроме того, выполняя метод "seach" ($this->getProductRepository()->search([$id])) класса ProductRepository(), мы вновь задействуем фабрику экземпляров:

public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }
        $productList = [];
        foreach ($this->getDataFromSource(['id' => $ids]) as $item) {
            $productList[] = new Product(
                $item['id'],
                $item['name'],
                $item['price']
            );
        }
        return $productList;
    }

Здесь создаются экземпляры класса Product с id, переданными из массива в методе getinfo() класса ProductService.
В данном случае фабричный метод применён для автоматизации создания группы экземпляров класса Product по массиву id.
Короткая запись "$this->getProductRepository()->search([$id])" приводит к созданию большого количество объектов с заданными свойствами.
*/






