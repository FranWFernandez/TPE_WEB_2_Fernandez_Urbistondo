<?php
require_once './app/controllers/product.controller.php';

class ProductView {

    public function viewProducts($products, $categorys) {   
        require_once './templates/listar_productos.phtml';
    }

    public function viewAbout($product, $category) {

        require_once './templates/about_producto.phtml';
    }

    public function viewAdmin($products, $categorys) {
        require_once './templates/form_alta_producto.phtml';

        require_once './templates/vista_admin.phtml';       
    }

    public function viewFormModify() {
        require_once './templates/form_modificar_producto.phtml';
    }
}