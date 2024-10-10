<?php

class ProductModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_tpe_web_2;charset=utf8', 'root', '');
    }

    public function getProducts() {
        $query = $this->db->prepare('SELECT * FROM alimentos');
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    public function getProduct($id) {

        $query = $this->db->prepare('SELECT * FROM alimentos WHERE id_alimento = ?');
        $query->execute([$id]);

        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }


    public function insertProduct($nombre, $valor, $descripcion, $tipo) {
        $query = $this->db->prepare('INSERT INTO alimentos(nombre, descripcion, valor, id_producto) VALUE(?,?,?,?)');
        $query->execute([$nombre, $descripcion, $valor, $tipo]);
    }

    public function removeProduct($id) {
        $query = $this->db->prepare('DELETE FROM alimentos WHERE id_alimento = ?');
        $query->execute([$id]);
    }

    public function remakeProduct($nombre, $descripcion, $valor, $tipo, $id) {
        $query = $this->db->prepare('UPDATE alimentos SET nombre = ?, descripcion = ?, valor = ?, id_producto = ? WHERE id_alimento = ?');
        $query->execute([$nombre, $descripcion, $valor, $tipo, $id]);
    }
}