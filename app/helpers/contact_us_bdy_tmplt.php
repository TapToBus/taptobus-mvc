<?php


function contact_us_body($message, $name, $email, $mobile){
    $bdy = '<p style="font-weight: 500;">Dear Sir/Madam,<p>
            <p style="text-align: justify;">' . $message . '</p>
            <p>Regards,<br>' . $name . '</p>
            <p>Contact info: <br>
            <b>Email:</b> <a href="mailto:' . $email . '">' . $email . '</a><br>
            <b>Mobile No:</b> ' . $mobile . '</p>';
    
    return $bdy;
}