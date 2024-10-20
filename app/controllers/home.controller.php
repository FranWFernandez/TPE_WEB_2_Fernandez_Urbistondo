<?php
    require_once './app/models/product.model.php';
    require_once './app/models/categories.model.php';
    require_once './app/views/product.view.php';

    class HomeController {
        private $model;
        private $category;
        private $view;

        public function __construct() {
            $this->model = new ProductModel();
            $this->category = new CategoryModel();
            $this->view = new ProductView();
        }

        public function showHome() {
            $products = $this->model->getProducts();
            $categories = $this->category->getCategories();
            $this->view->showHome($products,$categories);
        }

        public function showAboutItem($id){
            $Item= $this->model->getProductById($id);
            $categories = $this->category->getCategories();
            
            if ($Item) {
                $this->view->showItem($Item, $categories); // Muestra el producto si existe
            } else {
                $this->view->showError("Producto no encontrado"); // Maneja el caso en que no se encuentre el producto
            }
        }

        public function showByCategory($id_producto) {
            $productbycat = $this->model->getProductByCategory($id_producto);
            $categories = $this->category->getCategories();
            $this->view->showByCategory($productbycat, $categories);
        }
    }