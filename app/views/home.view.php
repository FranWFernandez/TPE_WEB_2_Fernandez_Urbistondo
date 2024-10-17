<?php

class HomeView {
    public function showHome($products,$categories) {
        require 'templates/home.phtml';
    }
    public function showItem($Item){
        require './templates/aboutproduct.phtml';
    }
    public function showError($error) {
        require 'templates/error.phtml';
    }
}