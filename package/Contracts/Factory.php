<?php

namespace Contracts;

interface Factory
{
    // 生成类
    public function make($class);
}