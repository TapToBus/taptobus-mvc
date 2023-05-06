<?php

function emailVerSubject(){
    $sub = 'TapToBus Email Verification';
    return $sub;
}


function emailVerBody($otp){
    $bdy = '<p>Dear Sir/Madam,</p>
            <p>Please use the below code to verify your email.</p>
            <p>OTP: <span style="font-size: 18px;"><b>' . $otp . '</b></span></p>
            <p>If you did not request this, no action is needed.<br>
            Please do not reply directly to this email.</p>
            <p>Thanks,<br>TapToBus Team</p>';

    return $bdy;
}