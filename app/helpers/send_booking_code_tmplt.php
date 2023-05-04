<?php

function bookingCodeSubject(){
    $sub = 'TapToBus Booking Code';
    return $sub;
}


function bookingCodeBody($name, $code){
    $bdy = '<p>Dear ' . $name . ',</p>
            <p>Thank you for choosing our service.
            We have received your payment and are pleased to confirm your booking.</p>
            <p>Booking code: <span style="font-size: 18px;"><b>' . $code . '</b></span></p>
            <p>Please keep this booking code safe and secure.
            We will also use this code to identify your booking on the day of service.<br>
            If you have any questions or concerns, 
            please don\'t hesitate to contact us by replying to this email.</p>
            <p>We look forward to serving you and hope you have a wonderful experience with our service.</p>
            <p>Best regards,<br>
            TapToBus Team</p>';

    return $bdy;
}