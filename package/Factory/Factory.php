<?php

namespace Factory;

use Contracts\Factory;

/**
 *
 */

class ProductFactory implements Factory
{
    public function make($class)
    {
        return new $class;
    }
}