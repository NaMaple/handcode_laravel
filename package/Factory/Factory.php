<?php

namespace Factory;

use Contracts\Factory;
use ReflectionClass;

/**
 *
 */

class ProductFactory implements Factory
{
    public function make($class)
    {
        // 直接 new 类名没有办法传参
        // 引入反射
//        return new $class;

    $reflector = new ReflectionClass($class);
//    var_dump($reflector);
    // 获取到了构造函数
    $constructor = $reflector->getConstructor();
//    var_dump($constructor);die;

    if (is_null($constructor)) {
        return new $class;
    }

    $dependencies = $constructor->getParameters();
//    var_dump($dependencies);

    $instance = $this->resolveDependencies($dependencies);
//    var_dump($instance);die;
    return $reflector->newInstanceArgs($instance);
    }

    // 这个方法外部用不到，直接定义受保护的

    /**
     * 解析依赖 todo 这里没理解
     * @param $dependencies
     */
    protected function resolveDependencies ($dependencies)
    {
        $res = [];
        foreach ($dependencies as $dependency) {
            $className = $dependency->getClass()->name;
            $res[] = $this->make($className);
        }
        return $res;
    }

}