<?php

namespace Shop;

use Product;

class ShopClothes
{
    protected $product = [];

    public function setProduct (Product  $product)
    {
        $this->product[] = $product;
    }
}