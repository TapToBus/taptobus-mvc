<?php

session_start();

function isLoggedIn(){
    if (isset($_SESSION['user_username'])){
        return true;
    }else{
        return false;
    }
}