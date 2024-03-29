<?php

// load the config.php file
require_once 'config/config.php';


// autoload libraries
spl_autoload_register(
    function($className){
        require_once 'libraries/' . $className .'.php';
    }
);


// load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/fileuploadhelper.php';

require_once 'libraries/fpdf/fpdf.php';
require_once 'helpers/mail_helper.php';
require_once 'helpers/contact_us_sub_tmplt.php';
require_once 'helpers/contact_us_bdy_tmplt.php';
require_once 'helpers/temporery_pw_email_tmplt.php';
require_once 'helpers/mail_helper.php';
require_once 'helpers/otp_helper.php';
require_once 'helpers/email_verify_tmplt.php';
require_once 'helpers/send_booking_code_tmplt.php';
require_once 'helpers/forgot_pass_otp_tmplt.php';
require_once 'helpers/refund_email_tmplt.php';


//email template
require_once 'helpers/staff_tempory_PW_template.php';

