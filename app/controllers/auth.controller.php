<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';
require_once './app/helpers/auth.helper.php';

class AuthController {
    private $view;
    private $model;

    function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function autenticar() {
        $email = $_POST['email'];
        $password = $_POST['password'];
      

        if (empty($email) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            die();
        }

        $user = $this->model->getUser($email);
        if ($user && password_verify($password, $user->PASSWORD)) {
           
            AuthHelper::login($user);
            
           header('Location: ' . BASE_URL . '/editarproductos');
            
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }

    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }
}