<?php


function generateOTP(){
    $otp = random_int(100000, 999999);
    return strval($otp);    // good practice to return the OTP code as a string, rather than an integer
}