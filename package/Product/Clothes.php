<?php

namespace Product;

use Contracts\Product;

class Clothes implements Product
{
    protected $attribute;

    public function __construct(Attribute $attribute)
    {
        $this->attribute = $attribute;
    }

    public function getName()
    {
        return 'Clothes';
    }

    public function getAttribute()
    {
        $this->attribute->get();
    }
}