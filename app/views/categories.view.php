<?php

class CategoriesView {
    public function showCategories($categories) {
        $count = count($categories);

        require 'templates/listcategories.phtml';
        require 'templates/addproduct.phtml';
        require 'templates/editproduct.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}