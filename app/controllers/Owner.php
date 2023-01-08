<?php

class Owner extends Controller{
    public function __construct(){
        //
    }

    public function register(){
        $this->view('owner/register');
    }
}