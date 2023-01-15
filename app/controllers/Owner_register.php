<?php

class Owner_register extends Controller{
    public function __construct(){
        //
    }

    
    // owner register
    public function register(){
        $this->view('owner/register');
    }
}