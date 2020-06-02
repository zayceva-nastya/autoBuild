<?php

use View\Html\Html;

echo Html::create('TableEdited')->data($table)->setClass('table')->html();

$html = "";

foreach ($fields as $field) {
    $html .= Html::create('input')->setName($field)->html();
}

echo Html::create('Form')
    ->setMethod('POST')
    ->setAction('?action=add')
    ->setClass('form')
    ->setContent($html)
    // ->setContent(Html::create('Textarea')->setName('text')->html())
    // ->addContent(Html::create('Input')->setName('name')->html())
    ->addContent(Html::create('Input')->setType('submit')->setValue('OK')->html())
    ->html();
// print_r($fields);
?>
<!-- <form method="POST" action="?action=add" class="form">
    <textarea name='text'></textarea>
    <input name='name' type="text" value='name'>
    <input type="submit" value='OK'>
</form> -->