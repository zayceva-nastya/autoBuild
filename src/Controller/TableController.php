<?php

namespace Controller;

use Model\CRUDInterface;
use View\View;

class TableController extends AbstractController
{
    protected CRUDInterface $table;
    protected View $view;

    public function __construct(CRUDInterface $table, View $view)
    {
        $this->table = $table;
        $this->view = $view;
        $this->view->setTemplate('table');
    }

    public function actionShow()
    {
        // print_r($this->table->get());
        $this
            ->view
            ->setData(['table' => $this->table->get()])
            ->view();
    }

    public function actionAdd(array $data)
    {
        // print_r($data);
        $this->table->add($data['post']);
        $this->redirect('?action=show');
    }

    public function actionDel(array $data)
    {

        // print_r($data);
        if (isset($data['get']['id'])) {
            $this->table->del($data['get']['id']);
        }
        $this->redirect('?action=show');
    }

    public function actionDefault()
    {
        $this
            ->view
            ->setTemplate('default')
            ->view();
    }
}
