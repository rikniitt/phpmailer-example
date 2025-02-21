<?php

/**
 * Configure and require all necessary php files
 */

// Path to this directory
define('PROJECT_DIR', realpath(__DIR__));

// Some php settings
date_default_timezone_set('Europe/Helsinki');

// Require PHPMailer library
require PROJECT_DIR . '/lib/PHPMailer/src/PHPMailer.php';
require PROJECT_DIR . '/lib/PHPMailer/src/SMTP.php';
require PROJECT_DIR . '/lib/PHPMailer/src/Exception.php';

// Require custom php code
require PROJECT_DIR . '/src/configuration.php';
require PROJECT_DIR . '/src/request_mailer.php';
require PROJECT_DIR . '/src/http.php';

