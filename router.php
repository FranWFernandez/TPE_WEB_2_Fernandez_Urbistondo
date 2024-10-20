<?php
require_once 'app/controllers/product.controller.php'; 
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/categories.controller.php';
require_once 'app/controllers/home.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; //accion por defecto

if(!empty($_GET['action'])){
    $action = $_GET['action'];
}

$params = explode('/', $action);

// home                    ->     HomeController            ->      showHome();
// showitem                ->     HomeController            ->      showAboutItem();
// product                 ->     ProductController         ->      showProducts();
// addproduct              ->     ProductController         ->      addProduct();     
// deleteproduct           ->     ProductController         ->      deleteProduct($id); 
// updateproduct           ->     ProductController         ->      updateProduct();
// showbycategory          ->     ProductController         ->      showByCategory($id);
// category                ->     CategoriesController      ->      showCategories();
// addcategory             ->     CategoriesController      ->      addCategory();
// deletecategory          ->     CategoriesController      ->      removeCategory($id);
// updatecategory          ->     CategoriesController      ->      updateCategory();
// login                   ->     AuthController            ->      showLogin();
// autenticar              ->     AuthController            ->      autenticar();
// logout                  ->     AuthController            ->      logout();

switch($params[0]) {
    case 'home' :
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'showitem' :
        $controller = new HomeController();
        $controller->showAboutItem($params[1]);
        break;
    case 'product':
        $controller = new ProductController;
        $controller->showProducts();
        break;
    case 'addproduct':
        $controller = new ProductController();
        $controller->addProduct();
        break;
    case 'deleteproduct':
        $controller = new ProductController();
        $controller->deleteProduct($params[1]);
        break;
    case 'updateproduct':
        $controller = new ProductController();
        $controller->updateProduct();
        break;
    case 'showbycategory':
        $controller = new HomeController();            
        $controller->showByCategory($params[1]);
        break;
    case 'category' :
        $controller = new CategoriesController();
        $controller->showCategories();
        break;
    case 'addcategory':
        $controller = new CategoriesController();
        $controller->addCategory();
        break;
    case 'deletecategory':
        $controller = new CategoriesController();
        $controller->removeCategory($params[1]);
        break;
    case 'updatecategory':
        $controller = new CategoriesController();
        $controller->updateCategory();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'autenticar':
        $controller = new AuthController();
        $controller->autenticar();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default:
        echo 'ERROR 404: not found';
        break;
}