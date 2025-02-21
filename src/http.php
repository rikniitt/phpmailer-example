<?php

function do_redirect($location, $code = 301) {
    header('Location: ' . $location, true, $code);
    exit();
}