<?php

// simple page direct function
function direct($page){
    header('location:' . URLROOT . '/' . $page);
}