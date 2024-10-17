<?php
    require_once './app/models/product.model.php';
    require_once './app/models/categories.model.php';
    require_once './app/views/home.view.php';

    class HomeController {
        private $model;
        private $categorymodel;
        private $view;

        public function __construct() {
            $this->model = new ProductModel();
            $this->categorymodel = new CategoryModel();
            $this->view = new HomeView();
        }

        public function showHome() {
            $products = $this->model->getProducts();
            $categories = $this->categorymodel->getCategories();
            $this->view->showHome($products,$categories);
        }

        public function showAboutItem($id){
            $Item= $this->model->getProductById($id);
            
            if ($Item) {
                $this->view->showItem($Item); // Muestra el producto si existe
            } else {
                $this->view->showError("Producto no encontrado"); // Maneja el caso en que no se encuentre el producto
            }
        }
    }