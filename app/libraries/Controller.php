<?php

/*
    * base controller
    * loads the models and views
*/

class Controller{
    // load the model
    public function model($model){
        // require the model file
        require_once '../app/models/' . $model . '.php';
        // instantiate model
        return new $model;
    }


    // load the view
    public function view($view, $data = []){
        // check for the view files
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            // die('View does not exist');
            require_once '../app/views/users/error_404.php';
        }
    }
}