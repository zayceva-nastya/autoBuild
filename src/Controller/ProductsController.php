<?php

namespace Controller;

use View\View;

class ProductsController extends AbstractTableController
{

    protected $tableName = "products";

    public function __construct(View $view)
    {
        parent::__construct($view);
        $this->view->setFolder('products');
    }

    public function actionAdd(array $data)
    {
//
//        print_r($_FILES);
        $data['post']['image'] = $_FILES['image']['name'];
        $id = $this->table->add($data['post']);
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['image']['tmp_name'], "images/products/$id.$ext");
        $this->redirect('?action=show&type=' . $this->getClassName());
//        parent::actionAdd($data);
    }

//    public function actionEdit(array $data)
//    {
//
//        $data['post']['image'] = $_FILES['image']['name'];
//        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
//        $id = $data['post']['id'];
//
//        move_uploaded_file(
//            $_FILES['image']['tmp_name'],
//            "images/products/$id.$ext"
//        );
////  parent::actionEdit($data);
//
//    }
//
//    public function actionDel(array $data)
//    {
////        print_r($this->dishesTable->getCountOrdersDish());
////        print_r($data);
//        if ($this->dishesTable->getCountOrdersDish($data['get']['id']) == 0) {
//            $id = $data['get']['id'];
//            $img = $this->table->get(['id' => $id])[0]['image'];
//            $ext = pathinfo($img, PATHINFO_EXTENSION);
//            if (file_exists("images/products/$id.$ext")) {
//                unlink("images/products/$id.$ext");
//            }
//
//        } else {
//            $_SESSION['errors'][] = "Это блюдо уже заказо!";
//            $this->redirect("$_SERVER[HTTP_REFERER]");
//        }
//        parent::actionDel($data);
//    }
}
