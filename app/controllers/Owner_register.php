<?php

class Owner_register extends Controller{
    public function __construct(){
        //
    }

    
    // register owner
    public function register(){
        $this->view('owner/register');
    }
}