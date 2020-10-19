<?php

namespace Controller;

use Core\Config;
use Model\AuthModel;
use TexLab\MyDB\DB;
use TexLab\MyDB\DbEntity;
use View\View;
use Model\ReviewModel;

class AnswerController extends AbstractTableController
{


    protected $table;
    protected $tableName = 'reviews';

    public function __construct(View $view)
    {
       
        parent::__construct($view);
        $this->view->setFolder('reviewadmin');
    }
    public function actionShow(array $data){
      print_r($data);
    }
    public function actionAdd(array $data)
    {
        parent::actionAdd($data);
        $this->redirect('?action=show&type=reviews');
    }
    public function actionEdit(array $data)
    {
        parent::actionEdit($data);
    }
    public function actionShowEdit(array $data)
    {
        parent::actionShowEdit($data);
    }
    
}
