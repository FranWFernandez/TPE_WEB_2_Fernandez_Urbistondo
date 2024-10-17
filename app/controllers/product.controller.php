<?php
require_once './app/models/product.model.php';
require_once './app/views/product.view.php';
require_once './app/models/categories.model.php';
require_once './app/helpers/auth.helper.php';

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
        $categories = $this->category->getCategories();
        $this->view->showProducts($products, $categories);
    }

    /* public function showAbout($id) {

        $product = $this->model->getProduct($id);
        $category = $this->category->getCategory($product->id_producto);

        $this->view->viewAbout($product, $category); 
    } */

    public function addProduct() {
        
        AuthHelper::verify();

        if(empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['valor']) || empty($_POST['id_producto'])){
            $this->view->showError("Debe completar todos los campos");
        } else {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $valor = $_POST['valor'];
            $id_producto = $_POST['id_producto'];
            $id = $this->model->insertProduct($nombre, $descripcion, $valor, $id_producto);
            if ($id) {
                header('location:'.BASE_URL.'/product');
            } else {
                $this->view->showError("Error al insertar producto");
            }
        }
    }

    public function deleteProduct($id) {

        AuthHelper::verify();

        $this->model->removeProduct($id);

        header('location:'.BASE_URL.'/product');
    }

    public function updateProduct() {

        AuthHelper::verify();
        
        if(empty ($_POST['id_productoEditar']) || empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['valor']) || empty($_POST['id_producto'])){
            $this->view->showError("ERROR EN EDITAR");
        } else {
            $id = $_POST['id_productoEditar'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $valor = $_POST['valor'];
            $id_producto = $_POST['id_producto'];
            
            $this->model->updateProduct($id, $nombre, $descripcion, $valor, $id_producto);
            
            if ($id) {
                header('location:'.BASE_URL.'/product');                
            } else {
                $this->view->showError("Error al editar el producto");
            }
        }
    }

    public function showByCategory($id_producto) {
        $productbycat = $this->model->getProductByCategory($id_producto);
        $this->view->showByCategory($productbycat);
    }
}