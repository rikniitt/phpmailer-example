<?php

require __DIR__ . '/../include.php';

var_dump($_POST);
$mailer = initialize_smtp_mailer();
var_dump($mailer);
