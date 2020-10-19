<?php

namespace Controller;

use View\View;

class ReviewsController extends AbstractTableController
{

    protected $tableName = "reviews";
    public function __construct(View $view)
    {
        parent::__construct($view);
        $this->view->setFolder('review');
    }

    public function actionAdd(array $data)
    {
////
    //    print_r($data);
       $data['post']['answer'] = '';
        $data['post']['photo'] = $_FILES['photo']['name'];
        $id = $this->table->add($data['post']);
        $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['photo']['tmp_name'], "images/review/$id.$ext");
        $this->redirect('?action=show&type=' . $this->getClassName());
//        parent::actionAdd($data);
    }
    public function actionShowEdit(array $data)
    {
        parent::actionShowEdit($data);
    }
    public function actionDel(array $data)
    {
        parent::actionDel($data);
    }
     public function actionEdit(array $data)
     {
         parent::actionEdit($data);
     }
}
