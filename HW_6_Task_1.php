<?php
/*
Задание. Найдите в проекте паттерн Шаблонный метод (Template Method). Напишите, в каком классе и методе он применён.

Паттерн Шаблонный метод предполагает использование абстрактного класса. В нашем проекте применяется один абстрактный класс - BaseController.
В нём нет абстратктных методов, которые, должны переопределяться в потомках. Но есть методы render() и redirect(), которые используются в потомках,
наполняясь в каждом из них своим содержанием. Например, в классе-потомке OrderController в методе infoAction() используется метод render(). В нём
переменной $view присваивается значение 'order/info.html.php', а переменной $parameters - ['productList' => $productList, 'isLogged' => $isLogged,
'totalPrice' => $totalPrice]. В другом классе-потомке ProductController в методе infoAction() также используется render(), но переменной $view уже
присваивается другое значение 'product/info.html.php', а переменной $parameters - ['productInfo' => $productInfo, 'isInBasket' => $isInBasket]. То же
самое и с методом redirect().
*/
