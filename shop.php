<?php
/**
 * 依赖注入
 */
require __DIR__ . "/vendor/autoload.php";

// 实例化工厂类
$factory = new Factory\ProductFactory();

// new 太多了，引入工厂模式
$shopClothes = new \Shop\ShopClothes();
$shopShes = new \Shop\ShopShoes();

$clothes = new \Product\Clothes();

// 工厂模式，创造一个工厂类，用来实例化对象，再把实例化好的对象传参到另一个类中
$shopClothes->setProduct($factory->make('Product\Clothes'));
$shopShes->setProduct($factory->make('Product\Shoes'));


var_dump($shopClothes, $shopShes);