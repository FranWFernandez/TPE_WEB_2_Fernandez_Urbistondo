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
            $fran = $this->model->getProducts();
            $categories = $this->categorymodel->getCategories();
            $this->view->showHome($fran);
        }

        public function showAboutItem($id){
            $Item= $this->model->getProductById($id);
            $this->view->showItem($Item);
        }
    }