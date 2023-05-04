<?php

function forgotPassSubject(){
    $sub = 'TapToBus User Verification';
    return $sub;
}


function forgotPassBody($otp){
    $bdy = '<p>Dear Sir/Madam,</p>
            <p>Please use the below code to verify that this request is coming from you.</p>
            <p>OTP: <span style="font-size: 18px;"><b>' . $otp . '</b></span></p>
            <p>If you did not request this, change your account password immediately.<br>
            Please do not reply directly to this email.</p>
            <p>Thanks,<br>TapToBus Team</p>';

    return $bdy;
}