<?php

namespace Illuminate\Container;

use ReflectionClass;

/**
 *
 */
class Container
{
    /**
     * A 依赖 C，容器获取 C 的实例，注入 A
     * 容器用来生成实例的
     */
    public function make($abstract)
    {
        return $this->resolve($abstract);
    }

    /**
     * 解析抽象
     * @param $abstract
     */
    protected function resolve($abstract)
    {
        $concrete = $abstract;

        // 创建实例
        return $this->build($concrete);
    }

    /**
     * 构建实例
     * @param $concrete
     */
    protected function build($concrete)
    {
        // 通过反射，获得反射对象
        $reflector = new ReflectionClass($concrete);

        // 获取已反射的类的构造函数，没有构造函数返回 NULL
        $constructor = $reflector->getConstructor();

        // 如果没有构造函数，就创造一个实例
        if (is_null($constructor)){
            return new $concrete;
        }

        // 获得依赖
        // abstract class ReflectionFunctionAbstract implements Reflector
        // ReflectionFunctionAbstract 中的方法
        $dependencies = $constructor->getParameters();

        // 解析依赖
        $instances = $this->resolveDependencies($dependencies);

        // 从给出的参数创建一个新的类实例（依赖）
        return $reflector->newInstanceArgs($instances);
    }

    /**
     * 解析依赖，什么是依赖
     * @param $dependencies
     */
    protected function resolveDependencies ($dependencies)
    {
        $results = [];
        foreach ($dependencies as $dependency) {
            $results[] = $this->make($dependency->getName());
        }
        return $results;
    }


}