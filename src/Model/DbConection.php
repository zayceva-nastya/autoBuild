<?php

namespace Model;

use mysqli;

class DbConection
{
    private static $instances = [];

    private const CONECTION_DATA = [
        'host' => null,
        'username' => null,
        'passwd' => null,
        'dbname' => null,
        'port' => null,
        'socket' => null
    ];

    final private function __construct()
    {
    }

    public static function create(array $conectionData)
    {
        $conection = array_merge(self::CONECTION_DATA, $conectionData);

        return self::$instances[serialize($conection)] ?? self::$instances[serialize($conection)] = new mysqli(
            $conection['host'],
            $conection['username'],
            $conection['passwd'],
            $conection['dbname'],
            $conection['port'],
            $conection['socket']
        );

        // if (!isset(self::$instances[serialize($conection)])) {
        //     self::$instances[serialize($conection)] = new mysqli(
        //         $conection['host'],
        //         $conection['username'],
        //         $conection['passwd'],
        //         $conection['dbname'],
        //         $conection['port'],
        //         $conection['socket']
        //     );
        // }
        // return self::$instances[serialize($conection)];
    }
}
