<?php

function temporery_password_email($fname, $password,$type){
    $body = '<p style = "font-weigth:500;">Hi <b> ' . $fname.'</b> <br>'.

            'Welcome to <B><a href="#">TapToBus!</a></B><br><br>
                
                <p>We are writing to provide you 
                with a secure password that you will need to access our system as a '.$type.'
                Please find the password attached to this email.</p><br>
                <p style="font-size: 23px;"><b>'.$password.'</b></p>   

            <br>We kindly request that you change the 
            password once you have successfully logged into the account. Please do not share 
            the password with anyone else'.
            
            '<br>If you have any questions or concerns, please do not hesitate to contact us.<br>
             Thank you! for join with TapToBus.';
    
    return $body;
}