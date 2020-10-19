<?php

use View\Html\Html;

/** @var int $pageCount Количество страниц
 * @var array $fields Список полей таблицы
 * @var array $comments Комментарии к полям таблицы
 * @var string $type Имя контроллера
 */

echo Html::create("Pagination")
    ->setClass('pagination')
    ->setControllerType($type)
    ->setPageCount($pageCount)
    ->html();

foreach ($table as &$row) {
    $ext = pathinfo($row['image'], PATHINFO_EXTENSION);
    $row['image'] = "<img src='images/products/$row[id].$ext' class='img'>";
}

echo Html::create('TableEdited')
    ->setControllerType($type)
    ->setHeaders($comments)
    ->data($table)
    ->setClass('table')
    ->html();


// $form = Html::create('Form')
//     ->setMethod('POST')
//     ->setAction("?action=add&type=$type")
//     ->setClass('form');


// foreach ($fields as $field) {
//     $form->addContent(Html::create('Label')->setFor($field)->setInnerText($comments[$field])->html());
//     $form->addContent(Html::create('input')->setName($field)->setId($field)->html());
// }

// $form->addContent(
//     Html::create('Input')
//         ->setType('submit')
//         ->setValue('OK')
//         ->html()
// );

// echo $form->html();
$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=add&type=$type")
    ->setClass('hidden')
    //    ->addClass('hidden', 'form')
    ->setId('addForm');

foreach ($fields as $field) {
 if($field !='time'){
    if ($field == 'image') {
        $form
            ->addContent(
                Html::create('input')
                    ->setName($field)
                    ->setId($field)
                    ->setType('file')
                    ->html()
            );
    } elseif ($field == 'description') {
        $form
            ->addContent(
                Html::create('textarea')
                    ->setRow('70')
                    ->setColl('70')
                    ->setName($field)
                    ->setId($field)
                    ->html()
            );
    } else {
        $form
        ->addContent(
            Html::create('Label')
                ->setClass('comment')
                ->setFor($field)
                ->setInnerText($comments[$field])
                ->html()
        );
        $form
            ->addContent(
                Html::create('input')
                    ->setName($field)
                    ->setId($field)
                    ->html()
            );
    }
}
 }
   

$form->addContent(
    Html::create('Input')
        ->setType('submit')
        ->setValue('Добавить')
        ->html()
);
echo $form->html();
