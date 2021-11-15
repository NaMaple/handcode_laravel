<?php

namespace Product;

class Shoes implements \Product
{

    public function getName()
    {
        return 'Shoes';
    }

    public function getAttribute()
    {
        return 'Shoes Attribute';
    }
}
