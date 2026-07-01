<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "app/Controllers/PerfilLaboralController.php";

$controller = new PerfilLaboralController();
$controller->crear();