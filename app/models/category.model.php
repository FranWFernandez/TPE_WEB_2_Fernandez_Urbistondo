<?php

class CategoryModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_tpe_web_2;charset=utf8', 'root', '');
    }

    public function getCategorys() {
        $query = $this->db->prepare('SELECT * FROM productos ');
        $query->execute();
        $category = $query->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }

    public function getCategory($id) {
        $query = $this->db->prepare('SELECT * FROM productos WHERE id_producto = ?');
        $query->execute([$id]);
        $category = $query->fetch(PDO::FETCH_OBJ);

        return $category->nombre;
    }
}