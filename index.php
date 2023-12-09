<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

use App\App;

use Dotenv\Dotenv;

define('_DIR_ROOT', str_replace('\\', '/', __DIR__));
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$webRoot = $protocol . $_SERVER['HTTP_HOST'];
$folder = str_replace($_SERVER['DOCUMENT_ROOT'], '', _DIR_ROOT);
$webRoot .= $folder;
define('_WEB_ROOT', $webRoot);

require_once 'vendor/autoload.php';
require_once 'configs/loadConfigs.php';

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();
new App();
