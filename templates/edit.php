<?php

use View\Html\Html;

$html = "";

foreach ($data as $name => $value) {
    $html .= Html::create('input')->setName($name)->setValue($value)->html();
}

echo Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type")
    ->setClass('form')
    ->setContent($html)
    ->addContent(Html::create('Input')->setType('hidden')->setName('id')->setValue($id)->html())
    ->addContent(Html::create('Input')->setType('submit')->setValue('OK')->html())
    ->html();
