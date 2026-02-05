<?php

require_once 'model/funktionen.inc.php';
spl_autoload_register('autoloadControllers');
spl_autoload_register('autoloadEntities');
spl_autoload_register('autoloadTraits');

$aktion = $_GET['aktion'] ?? 'alleST';
$controller = $_GET['controller'] ?? 'index';

$controllerName = ucfirst($controller) . 'Controller';

if (class_exists($controllerName)) {
    $requestController = new $controllerName();
    $requestController->run($aktion);
} else {
    $requestController = new IndexController();
    $requestController->render404();
}




