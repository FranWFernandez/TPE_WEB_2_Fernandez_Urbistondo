<?php

class HomeView {
    public function showHome($fran) {
        require 'templates/home.phtml';
    }
    public function showItem($Item){
        require './templates/aboutproduct.phtml';
    }
    public function showError($error) {
        require 'templates/error.phtml';
    }
}