<?php

namespace Controller;

abstract class AbstractController
{

    protected function redirect(string $location)
    {
        header("Location: $location");
    }

    protected function getClassName()
    {
        preg_match(
            '/(.*)Controller$/',
            (new \ReflectionClass(get_class($this)))->getShortName(),
            $match
        );
        return strtolower($match[1]);
    }
}
