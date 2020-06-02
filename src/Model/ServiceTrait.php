<?php

namespace Model;

trait ServiceTrait
{
    public function getFields()
    {
        $result = $this->mysqli->query("SHOW COLUMNS FROM $this->tableName");
        return array_column($this->queryResultToArray($result), 'Field');
    }
}
