<?php

namespace Product;

use Contracts\Product;

class Clothes implements Product
{

    public function getName()
    {
        return 'Clothes';
    }

    public function getAttribute()
    {
        return 'Clothes Attribute';
    }
}