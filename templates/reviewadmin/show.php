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
    if (!empty($row['photo'])) {
        $ext = pathinfo($row['photo'], PATHINFO_EXTENSION);
        $row['photo'] = "<img src='../public/images/review/$row[id].$ext' class='img'>";
    }
}
if($_SESSION['user']['cod'] == 'user'){
    echo Html::create('TableforAnswer')
    ->setControllerType('adminanswer')
    ->setHeaders($comments)
    ->data($table)
    ->setClass('table')
    ->html();
}
// else{
//    echo Html::create('TableEditedAdmin')
//     ->setControllerType('$type')
//     ->setHeaders($comments)
//     ->data($table)
//     ->setClass('table')
//     ->html(); 
// }



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
print_r($_SESSION);
if($_SESSION['user']['cod'] == 'admin'){
    $form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=add&type=adminanswer")
    ->setClass('hidden')
    //    ->addClass('hidden', 'form')
    ->setId('addForm');

foreach ($fields as $field) {
    if ($field != 'time') {
        if ($field == 'photo') {
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
        }elseif($field == 'user_name') {
            $form
                ->addContent(
                    Html::create('input')
                        ->setName($field)
                        ->setId($field)
                        ->setValue($_SESSION['user']['FIO'])
                        ->setType('hidden')
                        ->html());
        }elseif($field == 'users_id'){
            $form
            ->addContent(
                Html::create('input')
                    ->setName($field)
                    ->setId($field)
                    ->setValue($_SESSION['user']['id'])
                    ->setType('hidden')
                    ->html());
        }
        else {
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
}


