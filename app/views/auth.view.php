<?php

class AuthView {

    public function showLogin($error = null) {
        require_once './templates/login.phtml';
    }
}