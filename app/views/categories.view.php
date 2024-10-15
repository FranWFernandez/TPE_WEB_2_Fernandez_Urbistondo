<?php

class CategoriesView {
    public function showCategories($categories) {
        $count = count($categories);

        require 'templates/listcategories.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}