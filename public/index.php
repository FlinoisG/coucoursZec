<?php

require_once "../vendor/autoload.php";

use App\Controller\PostController;
use App\Controller\DefaultController;

if (!isset($_GET["p"])){
  $p = "index";
} else {
  $p = $_GET["p"];
}

$controller = "\\App\\Controller\\Controller";
$controller = new $controller();
call_user_func_array([$controller, $p], []);

$titre = 'Concours Zec';
$header = '';