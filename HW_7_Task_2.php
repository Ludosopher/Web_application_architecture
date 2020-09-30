<?php
/*
 Задание 2. Найти в проекте паттерн Registry и объяснить, почему он был применён.

Паттерн Registry реализуется классом Registry в файле Registry.php в директории app\framework.
Он применён для того, чтобы лишь однажды создать экземпляр класса ContainerBuilder() в index.php и потом обращаться к нему в классе Kernel и
трейте Render не создавая экземпляр каждый раз заново. Для этого экземпляр ContainerBuilder() размещается в классе Registry. Потом по необходимости
извлекаются различные его компоненты методами getDataConfig(string $name) и getRoute(string $name, array $parameters = []).

 */