<?php

function refundSubject(){
    $sub = 'Booking Cancellation';
    return $sub;
}


function refundBody($name, $refund){
    $bdy = '<p>Dear ' .$name. ',</p>
            <p>Your booking cancellation was successful.<br>
            Refund: LKR ' .$refund. '.00</p>
            <p>We will deposit the refund amount in 5 working days to your account.
            If you have any questions regarding the refunding policy 
            visit our Terms & Conditions page or 
            contact our customer service by Contact us on our site.</p>
            <p>Thank you,<br>TapToBus Team</p>';

    return $bdy;
}