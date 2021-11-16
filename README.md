# 简介
- 相关资料
  - 视频资料：https://www.bilibili.com/video/BV1wh41127nA?spm_id_from=333.999.0.0

- composer
  - 修改composer.json 文件后，需要输入命令行 composer dump-autoload
  - TestAutoload 文件为自动加载的练习路径文件
  - composer.json.bk 文件为自动加载练习配置文件
```json
"autoload": {
    "classmap": [
        "TestAutoload/ClassMap/Demo",
        "TestAutoload/ClassMap",
        "package"
    ],
    "psr-4": {
        "PSR4\\": "TestAutoload/PSR4",
        "": "TestAutoload/NoNameSpace"
    },
    "files": [
        "TestAutoload/Files/file.php",
        "TestAutoload/Files/file1.php"
    ]
}
```
    

- package
  - 基本概念，练习依赖，工厂模式，IOC容器
  
- TimidHaunter/laravel/src/Illuminate/Container/Container.php
  - TimidHaunter 替代视频中的Package文件夹
  - 容器
  
  
