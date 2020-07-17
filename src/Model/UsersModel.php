<?php


namespace Model;


use mysqli;
use TexLab\MyDB\DbEntity;

class UsersModel extends DbEntity
{
    public function __construct(string $tableName, mysqli $mysqli)
    {
        parent::__construct($tableName, $mysqli);
        $this
            ->setSelect('`users`.`id`, `users`.`login`, `users`.`password`, `group`.`name` AS group_id')
            ->setFrom('`users`,`group`')
            ->setWhere('`users`.`group_id` = `group`.`id`');
    }
}