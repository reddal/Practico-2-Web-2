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
    case 'filter':
        if (isset($_GET['area'])) {
            if (!empty($_GET['area'])) {
                getList($_GET['area']);
            } else {
                echo ('ingrese un area e intente de nuevo');
                echo ("<br><a href='./'>Volver</a>");
            }
        } else {
            getList(null);
        }
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
