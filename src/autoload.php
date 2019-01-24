<?php

// Load Config
require_once __DIR__.'/../app/config/config.php';


// Autoload Core Libraries
spl_autoload_register(function ($className) {
    $file = APP_SRC_ROOT . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    if (file_exists($file)) {
        require $file;
        return true;
    }
    return false;
});

