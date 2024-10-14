<?php
require_once './app/models/product.model.php';
require_once './app/views/product.view.php';
require_once './app/models/category.model.php';

class ProductController {

    private $model;
    private $view;
    private $category;

    public function __construct() {
        $this->model = new ProductModel;
        $this->view = new ProductView;
        $this->category = new CategoryModel;
    }

    public function showProducts() {
        $products = $this->model->getProducts();
        $categorys = $this->category->getCategorys();
        $this->view->viewProducts($products, $categorys);
    }

    public function showAbout($id) {

        $product = $this->model->getProduct($id);
        $category = $this->category->getCategory($product->id_producto);

        $this->view->viewAbout($product, $category); 
    }

    public function showAdmin() {
        $products = $this->model->getProducts();
        $categorys = $this->category->getCategorys();
        $this->view->viewAdmin($products, $categorys);
    }

    public function addProduct() {

        if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
            echo 'ERROR: falta completar el nombre';
        }
        if(!isset($_POST['valor']) || empty($_POST['valor'])){
            echo 'ERROR: falta completar el valor';
        }
        if(!isset($_POST['descripcion']) || empty($_POST['descripcion'])){
            echo 'ERROR: falta completar la descripcion';
        }
        if(!isset($_POST['tipo']) || empty($_POST['tipo'])){
            echo 'ERROR: falta completar el tipo';
        }

        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        $descripcion = $_POST['descripcion'];
        $tipo = $_POST['tipo'];

        $this->model->insertProduct($nombre, $valor, $descripcion, $tipo);

        header('location:'.BASE_URL.'administracion');
    }

    public function deleteProduct($id) {
        $this->model->removeProduct($id);

        header('location:'.BASE_URL.'administracion');
    }

    public function showModify() {
        $this->view->viewFormModify();
    }

    public function modify($id) {
        if (empty($_POST)){
            $this->showModify();
        }else{
        
        if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
            echo 'ERROR: falta completar el nombre';
        }
        if(!isset($_POST['valor']) || empty($_POST['valor'])){
            echo 'ERROR: falta completar el valor';
        }
        if(!isset($_POST['descripcion']) || empty($_POST['descripcion'])){
            echo 'ERROR: falta completar la descripcion';
        }
        if(!isset($_POST['tipo']) || empty($_POST['tipo'])){
            echo 'ERROR: falta completar el tipo';
        }

        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        $descripcion = $_POST['descripcion'];
        $tipo = $_POST['tipo'];

        $this->model->remakeProduct($nombre, $valor, $descripcion, $tipo, $id);
        
        header('location:'.BASE_URL.'administracion');
    }
    }
}