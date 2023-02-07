<?php

/*
    * app Core class
    * creates url & load core controller
    * url format -> controller/method/params
*/

class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];


    public function __construct(){
        $url = $this->getUrl();

        // check for 1st part of the url (look for controller)
        if(isset($url[0])){
            // check to see if the controller is exist
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                $this->currentController = ucwords($url[0]);
                // unset 0 index
                unset($url[0]);
            }
        }

        // require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // instantiate the controller
        $this->currentController = new $this->currentController;

        // check for 2nd part of the url
        if(isset($url[1])){
            // check to see if the method exist in controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                // unset 1 index
                unset($url[1]);
            }
        }

        // check for remainin parts of the url (look for parms)
        $this->params = $url ? array_values($url) : [];

        // call a callback with array of parms
        call_user_func_array(
            [$this->currentController, $this->currentMethod], 
            $this->params
        );
    }


    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}