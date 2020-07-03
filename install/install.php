<?php

require "vendor/autoload.php";

use TexLab\MyDB\Runner;
use TexLab\MyDB\DB;

// class MyRunner extends Runner
// {
//     protected function errorHandler(array $error)
//     {
//         echo $error["error"] . "\n";
//         echo $error["sql"] . "\n";
//     }
// }

$runner = new Runner(DB::Link([
    'host' => 'localhost',
    'username' => 'root',
    'password' => 'root',
]));

foreach (explode(";", file_get_contents('install/guests_book.sql')) as $value) {
    try {
        if (!empty($value)) {
            $runner->runSQL($value);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
