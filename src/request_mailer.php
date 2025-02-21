<?php

function is_valid_email($email) {
    if (!$email) {
        // No email given
        return false;
    }

    return filter_var($email, FILTER_VALIDATE_EMAIL) === $email;
}

function send_request($email) {
    $config = get_config();

    $mail = initialize_smtp_mailer();
    $mail->setFrom($config['sender']);
    $mail->addAddress($email);
    $mail->isHTML();
    $mail->Subject = 'New request for offer received';
    $mail->Body = offer_request_html($email);


    $was_sent = $mail->send();

    if ($mail->ErrorInfo) {
        error_log('DEBUG: phpmailer error info: ' . $mail->ErrorInfo);
    }

    return $was_sent;
}

function initialize_smtp_mailer() {
    $config = get_config();

    $mailer = new PHPMailer\PHPMailer\PHPMailer();
    $mailer->isSMTP();
    $mailer->Host = $config['mailer']['host'];
    $mailer->SMTPAuth = true;
    $mailer->Username = $config['mailer']['username'];
    $mailer->Password = $config['mailer']['password'];
    $mailer->SMTPSecure = $config['mailer']['secure'];
    $mailer->Port = $config['mailer']['port'];

    return $mailer;
}

function offer_request_html($email) {
    $domain = $_SERVER['SERVER_NAME'];
    $leave_time = date('Y-m-d H:i');

    return <<<EOHTML
    <!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New Request For Offer</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
            .container { width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #dddddd; border-radius: 5px; overflow: hidden; }
            .header { background-color: #007bff; color: #ffffff; padding: 20px; text-align: center; }
            .body { padding: 20px; }
            .footer { background-color: #f4f4f4; text-align: center; padding: 10px; font-size: 12px; color: #777777; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>New Request For Offer</h1>
            </div>
            <div class="body">
                <p>Customer just left new offer for request.</p>
                <p>Customer's email adderss: <strong>{$email}<strong></p>
            </div>
            <div class="footer">
                <p>This request was left at {$domain} {$leave_time}</p>
            </div>
        </div>
    </body>
    </html>
    EOHTML;
}
