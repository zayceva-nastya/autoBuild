<?php

namespace View\Html;

abstract class AbstractTag
{
    protected $class;
    protected $style;

    public function setClass(string $class)
    {
        $this->class = " class='$class'";
        return $this;
    }

    public function setStyle(string $style)
    {
        $this->style = " style='$style'";
        return $this;
    }
}
