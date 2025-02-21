<?php

require __DIR__ . '/../include.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    error_log('NOTICE: send_request_for_offer loaded without POST');
    do_redirect('index.html');
}

$email = $_POST['email'] ?? '';

if (!is_valid_email($email)) {
    error_log('NOTICE: invalid email address given');
    do_redirect('error.html');
}

// Do the actual mail sending
if (!send_request($email)) {
    error_log('CRITICAL: sending email failed');
    do_redirect('down.html');
}
do_redirect('thanks.html');
