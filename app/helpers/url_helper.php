<?php

function direct($page){
    header('location:' . URLROOT . '/' . $page);
}