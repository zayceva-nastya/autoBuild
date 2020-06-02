<?php

session_start();

include "../src/autoload.php";


(new Core\Dispatcher())->run();
