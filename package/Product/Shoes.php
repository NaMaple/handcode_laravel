<?php

namespace Product;

class Shoes implements \Contracts\Product
{
    protected $attribute;

    public function __construct(Attribute $attribute)
    {
        $this->attribute = $attribute;
    }

    public function getName()
    {
        return 'Shoes';
    }

    public function getAttribute()
    {
        $this->attribute->get();
    }
}
