<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once "getStuff.php";


if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}
$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        getList();
        break;
    case 'filter':
        getFiltered($_GET['area']);
        break;
    case 'detalle':
        getDetailed($params[1]);
        break;
    case 'home':
        getHome();
        break;
    default:
        echo ('<h1>404</h1>');
        break;
}
