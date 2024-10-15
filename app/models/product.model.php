<?php

require_once './app/models/model.php';

class ProductModel extends DB{

    public function getProducts() {
        $query = $this->connect()->prepare('SELECT * FROM alimentos');
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    public function getProductById($id) {

        $query = $this->connect()->prepare('SELECT * FROM alimentos WHERE id_alimento = ?');
        $query->execute([$id]);

        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }

    public function insertProduct($nombre, $valor, $descripcion, $tipo) {
        $query = $this->connect()->prepare('INSERT INTO alimentos(nombre, descripcion, valor, id_producto) VALUE(?,?,?,?)');
        $query->execute([$nombre, $descripcion, $valor, $tipo]);
    }

    public function removeProduct($id) {
        $query = $this->connect()->prepare('DELETE FROM alimentos WHERE id_alimento = ?');
        $query->execute([$id]);
    }

    public function updateProduct($nombre, $descripcion, $valor, $tipo, $id) {
        $query = $this->connect()->prepare('UPDATE alimentos SET nombre = ?, descripcion = ?, valor = ?, id_producto = ? WHERE id_alimento = ?');
        $query->execute([$nombre, $descripcion, $valor, $tipo, $id]);
    }

    public function getProductByCategory($id_product) {
        $query = $this->connect()->prepare('SELECT * FROM alimentos where id_producto=?');
        $query->execute([$id_product]);

        $itemCat = $query->fetchAll(PDO::FETCH_OBJ);
        return $itemCat;
    }
}