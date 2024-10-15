<?php 

require_once './app/models/model.php';

class UserModel extends DB{

    public function getUser($email) {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE USER_EMAIL=?');
        $query->execute([$email]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }
}