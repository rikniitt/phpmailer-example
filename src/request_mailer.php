<?php


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
