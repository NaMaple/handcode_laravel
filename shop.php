<?php
require __DIR__ . "/vendor/autoload.php";

$shopClothes = new \Shop\ShopClothes();
$shopShes = new \Shop\ShopShoes();

$clothes = new \Product\Clothes();

$shopClothes->setProduct($clothes);
$shopShes->setProduct(new \Product\Shoes());

var_dump($shopClothes, $shopShes);