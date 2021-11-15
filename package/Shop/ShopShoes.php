<?php

namespace Shop;

use Product;

class ShopShoes
{
    protected $product = [];

    // 依赖注入，不在类里实例化对象，直接将实例化的对象当做参数传递进来
    // 原本 ShopShoes 类依赖于 Shoes 类，现在直接将依赖关系注入到 ShopShoes 类中
    public function setProduct (Product $product)
    {
        $this->product[] = $product;
    }
}