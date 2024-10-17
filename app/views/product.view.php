<?php
require_once './app/controllers/product.controller.php';

class ProductView {

    public function showProducts($products, $categories) {   
        $count = count($products);

        require_once './templates/listproducts.phtml';
    }

    public function showError($error) {
        require_once './templates/error.phtml';
    }

    public function showByCategory($productbycat) {

        require 'templates/showbycategory.phtml';
    }
}