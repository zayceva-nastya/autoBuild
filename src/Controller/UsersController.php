<?php

namespace Controller;

use Core\Config;
use Model\UsersModel;
use TexLab\MyDB\DB;
use View\View;

class UsersController extends AbstractTableController
{

    protected $tableName = "users";

    public function __construct(View $view)
    {
        parent::__construct($view);
        $this->table = new UsersModel(
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
        parent::actionShow($data);

    }


}