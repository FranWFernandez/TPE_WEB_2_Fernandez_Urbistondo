<?php
require_once 'app/controllers/product.controller.php'; 
require_once 'app/controllers/auth.controller.php';
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/middlewares/verify.auth.middleware.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response(); 

if(!empty($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = 'home';
}

$params = explode('/', $action);

switch($params[0]) {
    case 'home':
        sessionAuthMiddleware($res);
        $controller = new ProductController;
        $controller->showProducts();
        break;
    case 'about':
        sessionAuthMiddleware($res);
        $controller = new ProductController;
        $controller->showAbout($params[1]);
        break;
    case 'administracion':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new ProductController();
        $controller->showAdmin();
        break;
    case 'nuevo':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new ProductController();
        $controller->addProduct();
        break;
    case 'eliminar':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new ProductController();
        $controller->deleteProduct($params[1]);
        break;
    case 'modificar':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new ProductController();
        $controller->Modify($params[1]);
        break;
    case 'modificado':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new ProductController();
        $controller->Modify($params[1]);
        break;
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default:
        echo 'ERROR 404: not found';
}