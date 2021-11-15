<?php

namespace Factory;

use Closure;
use Contracts\Factory;
use ReflectionClass;

/**
 *
 */

class ProductFactory implements Factory
{
    protected $instances = [];
    protected $bindings = [];

    /**
     * 单例
     */
    public function instance($abstract, $instance)
    {
        $this->instances[$abstract] = $instance;
    }

    /**
     * 生成实例
     * @param $class
     * @return mixed|object
     * @throws \ReflectionException
     */
    public function make($class)
    {
        if(isset($this->instances[$class])) {
            return $this->instances[$class];
        }

        if(isset($this->bindings[$class])) {
            $concrete = $this->bindings[$class];

            // 如果是闭包，就直接执行闭包
            if ($concrete instanceof Closure) {
                // 变量函数
                return $concrete();
            }
        }

        // 直接 new 类名没有办法传参
        // 引入反射
//        return new $class;

        // 获取 $class 的 reflectionClass （反射）对象
        $reflector = new ReflectionClass($class);
//        var_dump($reflector);
        // 获取 $class 构造函数
        $constructor = $reflector->getConstructor();
//        var_dump($constructor);die;

        if (is_null($constructor)) {
            return new $class;
        }

        // 获取 $class 的构造函数所有的依赖参数
        $dependencies = $constructor->getParameters();
//        var_dump($dependencies);

        // 解析依赖参数
        $instance = $this->resolveDependencies($dependencies);
//        var_dump($instance);die;

        /**
         * 生成最后的 $class
         * 创建一个类的新实例，给出的参数将传递到类的构造函数
         */
        return $reflector->newInstanceArgs($instance);
    }

    /**
     * 延时加载
     * $abstract 抽象名称
     * $concrete 具体的闭包
     *
     */
    public function bind($abstract, $concrete)
    {
        unset($this->instances[$abstract]);
        $this->bindings[$abstract] = $concrete;
    }

    /**
     * 这个方法外部用不到，直接定义受保护的
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