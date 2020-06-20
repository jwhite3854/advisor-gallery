<?php

define('APP_ROOT', dirname(__FILE__));
define('CORE_PATH', APP_ROOT.'/core');

$request = $_SERVER["REQUEST_URI"];

// Get the bootstrap file to get this going
require CORE_PATH . '/bootstrap.php';

// Are we in dev mode?
$is_dev_mode = ( $_GET['dev_mode'] == 1 );

// Get all those site-wide config settings
ArchiveApp::setConfigs();

// Run the Advisor App
ArchiveApp::run( $request, $is_dev_mode );
