<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require_once __DIR__.'/../app/config/config.php';
require_once __DIR__.'/../vendor/autoload.php';

// Init Core
$core = App\Kernel\Core::getInstance();
$core->initResponse();