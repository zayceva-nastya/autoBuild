<?php

session_start();

include "../vendor/autoload.php";


(new Core\Dispatcher())->run();
