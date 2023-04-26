<?php

// load the config.php file
require_once 'config/config.php';

/*
// load libraries
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';
*/

// autoload libraries
spl_autoload_register(
    function($className){
        require_once 'libraries/' . $className .'.php';
    }
);

// load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/mail_helper.php';
require_once 'helpers/contact_us_sub_tmplt.php';
require_once 'helpers/contact_us_bdy_tmplt.php';
require_once 'helpers/temporery_pw_email_tmplt.php';
