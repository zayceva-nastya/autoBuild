<?php

namespace Controller;

use Model\UsersModel;
use Core\Config;
use TexLab\MyDB\DB;
use View\View;
use Model\ReviewModel;

class AdminAnswerController extends AbstractTableController
{

    protected $tableName = "`reviews`";

    public function __construct(View $view)
    {
          parent::__construct($view);
        $this->view->setFolder('review');
        $this->table2 = new ReviewModel(
            $this->tableName,
            DB::Link([
                'host' => Config::MYSQL_HOST,
                'username' => Config::MYSQL_USER_NAME,
                'password' => Config::MYSQL_PASSWORD,
                'dbname' => Config::MYSQL_DATABASE
            ])
        );
     
    }
public function actionShow(array $data)
{
$data = $this->table2->getreviews();
    // print_r($data);
    $this
            ->view
            ->setTemplate('show')
            ->addData([
                'revid'=>$this->table2->getIdReview(),
                'table' => $this
                    ->table
                    ->reset()
                    ->setPageSize(Config::PAGE_SIZE)
                    ->getPage($data['get']['page'] ?? 1),
                'fields' => array_diff($this->table->getColumnsNames(), ['id']),
                'comments' => $this->table->getColumnsComments(),
                'type' => $this->getClassName(),
                'pageCount' => $this->table->pageCount()
            ]);
    parent::actionShow($data);
}

    public function actionAdd(array $data)
    {
//         $id = $this->table2->getIdReview();
//  print_r($data);
      $this->table2->answerAdd($data['post']['answer'],$data['post']['id']);
        // $this->redirect('?action=show&type=adminanswer');
    }
}
