<?php

function temporery_password_email($fname, $password,$type){
    $body = '<p style = "font-weigth:500;">Dear ' . $fname.'<br>'.

            'Welcome to <B> TapToBus!</B> 
                We are writing to provide you 
                with a secure password that you will need to access our system as a'.$type.'
                Please find the password attached to this email.<br>
                <center><b>'.$password.'</b></center>
            
            <br>We kindly request that you change the 
            password once you have successfully logged into the account. Please do not share 
            the password with anyone else'.
            
            '<br>If you have any questions or concerns, please do not hesitate to contact us. Thank you! for join with TapToBus.';
    
    return $body;
}