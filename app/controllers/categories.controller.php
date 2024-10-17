<?php

require_once './app/models/categories.model.php';
require_once './app/views/categories.view.php';
require_once './app/helpers/auth.helper.php';

class CategoriesController {
    private $viewCategory;
    private $modelCategory;


    public function __construct() {

        $this->viewCategory = new CategoriesView();
        $this->modelCategory = new CategoryModel();
    }


    public function showCategories() {
        $categories = $this->modelCategory->getCategories();
        $this->viewCategory->showCategories($categories);

    }

    public function addCategory() {

        AuthHelper::verify();

        if ( empty($_POST['categoriaAdd'])) {
            $this->viewCategory->showError("Debe completar todos los campos");
        }else {
            $categoriaAdd = $_POST['categoriaAdd'];
            $id = $this->modelCategory->insertCategory($categoriaAdd);
            if ($id) {
                header('Location: ' . BASE_URL . '/category');
            } else {
                $this->viewCategory->showError("Error al insertar el categoria");
            }
        }
    }
    
    public function updateCategory(){

        AuthHelper::verify();

        if (empty($_POST['id_categoriaEditar']) ||empty($_POST['categoriaEditar']) ) {
            $this->viewCategory->showError("ERROR EN EDITAR");
        }else {
            $categoriaID = $_POST['id_categoriaEditar'];
            $categoriaEditar = $_POST['categoriaEditar'];
            
            $this->modelCategory->updateCategory($categoriaID, $categoriaEditar);
            
            if ($categoriaID) {
                header('Location: ' . BASE_URL . '/category');
            } else {
                $this->viewCategory->showError("Error al insertar el categoria");
            }
        }

    }

    function removeCategory($id) {

        AuthHelper::verify();
        
        $this->modelCategory->deleteCategory($id);
        header('Location: ' . BASE_URL . '/category');
    }
}