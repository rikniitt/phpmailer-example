<?php

function get_config() {
    static $config = null;

    if (!$config) {
        $conf_file = PROJECT_DIR . '/config.php';

        if (!file_exists($conf_file)) {
            error_log('ERROR: Could not found config.php file. Please run "cp config-example.php config.php" in project directory.');
        } else {
            $config = require $conf_file;
        }
    }

    return $config;
}
