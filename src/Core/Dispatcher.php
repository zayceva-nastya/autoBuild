<?php

namespace Core;

use Core\Config;
use Controller\TableController;
use Model\DbConection;
use Model\DbTable;
use View\View;


class Dispatcher
{
    protected $view;
    protected $controllerName;
    protected $actionName;

    public function __construct()
    {
        $this->view = new View();
        $this->controllerName = "Controller\\" . (ucfirst(strtolower($_GET['type'] ?? 'Default'))) . "Controller";
        $this->actionName = "action" . ($_GET['action'] ?? 'Default');
    }

    public function run()
    {
        $this->view->setLayout('mainLayout');

        if (class_exists($this->controllerName)) {
            $controller = new $this->controllerName(
                $this->view
            );
            $controllerData = ['post' => $_POST, 'get' => $_GET];

            if (method_exists($controller, $this->actionName)) {
                $controller->{$this->actionName}($controllerData);
                $this->view->view();
            } else {
                header("HTTP/1.0 404 Not Found");
            }
        } else {
            header("HTTP/1.0 404 Not Found");
        }

        //        $action = "action" . $_GET["action"];
        // echo $_SERVER['REQUEST_URI'];

        // $controller->actionShow();
        // $controller->{"actionShow"}();
    }
}
