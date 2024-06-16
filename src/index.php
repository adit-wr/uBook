<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
if(!session_id()) session_start();

require_once '../src/config/default.php';
require_once '../src/core/Autoload.php';

$routes = new Routes();
$routes->run();