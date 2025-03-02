<?php
// 显示所有错误（仅在开发环境中使用）
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 自动加载类文件
spl_autoload_register(function ($class_name) {
    $paths = [
        __DIR__ . '/controller',
        __DIR__ . '/service',
        __DIR__ . '/dao',
        __DIR__ . '/config'
    ];
    foreach ($paths as $path) {
        $file = $path . '/' . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// 包含路由配置文件
require_once __DIR__ . '/routes.php';
?>