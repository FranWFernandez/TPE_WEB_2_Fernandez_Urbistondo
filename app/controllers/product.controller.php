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
        AuthHelper::verify();
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

        if(empty($_POST['nombre']) || empty($_POST['valor']) || empty($_POST['descripcion']) || empty($_POST['tipo'])){
            $this->view->showError("Debe completar todos los campos");
        } else {
            $nombre = $_POST['nombre'];
            $valor = $_POST['valor'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];
            $id = $this->model->insertProduct($nombre, $valor, $descripcion, $tipo);
            if ($id) {
                header('location:'.BASE_URL.'/editproducts');
            } else {
                $this->view->showError("Error al insertar producto");
            }
        }
    }

    public function deleteProduct($id) {
        $this->model->removeProduct($id);

        header('location:'.BASE_URL.'/editproducts');
    }

    public function updateProduct() {
        if(empty ($_POST['id_editproduct']) || empty($_POST['nombre']) || empty($_POST['valor']) || empty($_POST['descripcion']) || empty($_POST['tipo'])){
            $this->view->showError("ERROR EN EDITAR");
        } else {
            $id = $_POST['id_editproduct'];
            $nombre = $_POST['nombre'];
            $valor = $_POST['valor'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];
            
            $this->model->updateProduct($id, $nombre, $valor, $descripcion, $tipo, $id);
            
            if ($id) {
                header('location:'.BASE_URL.'/editproducts');                
            } else {
                $this->view->showError("Error al editar el producto");
            }
        }
    }

    public function showByCategory($product_id) {
        $productbycat = $this->model->getProductByCategory($product_id);
        $this->view->showByCategory($productbycat);
    }
}