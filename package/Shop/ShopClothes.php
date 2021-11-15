<?php

namespace Shop;

use Contracts\Product;

class ShopClothes
{
    protected $product = [];

    public function setProduct (Product  $product)
    {
        $this->product[] = $product;
    }
}