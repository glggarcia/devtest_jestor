<?php
session_start();

require 'vendor/autoload.php';
require 'config.php';
require 'routers.php';

use \Core\Core;

$core = new Core();
$core->run();