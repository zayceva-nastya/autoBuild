<?php

spl_autoload_register(function ($class_name) { // вызывает каждый раз когда вызывают ее
    $path =  str_replace('\\', '/', __DIR__ . '/' ."$class_name.php");

    if (file_exists($path)) {
        include $path;
    }
});
