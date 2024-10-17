<?php

require_once './app/models/model.php';

class CategoryModel extends DB{

    public function getCategories() {
        $query = $this->connect()->prepare('SELECT * FROM productos ');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }

    public function getCategory($id_category) {
        $query = $this->connect()->prepare('SELECT * FROM productos WHERE id_producto = ?');
        $query->execute([$id_category]);
        $category = $query->fetch(PDO::FETCH_OBJ);

        return $category->nombre;
    }

    function insertCategory($category) {
        $query = $this->connect()->prepare('INSERT INTO `productos` (`nombre`) VALUES(?)');
        $query->execute([$category]);
        return $this->connect()->lastInsertId();
    }

    function updateCategory($id_category,$name_category) {
        $query = $this->connect()->prepare('UPDATE productos SET nombre=? WHERE id_producto=?');
        $query->execute([$name_category, $id_category]);
    }

    function deleteCategory($id_category) {
        $query = $this->connect()->prepare('DELETE FROM productos WHERE id_producto = ?');
        $query->execute([$id_category]);
    }
}