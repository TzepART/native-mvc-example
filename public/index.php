<?php

error_reporting(-1);
ini_set('display_errors', 'On');


require_once '../src/autoload.php';

// Init Core
$core = \Kernel\Core::getInstance();
$core->initResponse();