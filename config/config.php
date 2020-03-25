<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

define('DB_NAME', 'sale_system');

define('DB_USER', 'root');

define('DB_PASSWORD', 'password');

define('DB_HOST', 'localhost');

if ( !defined('DS') )
    define('DS', DIRECTORY_SEPARATOR);
    
if ( !defined('BASEURL') )
    define('BASEURL', dirname(__FILE__, 2) . DS);
    
if ( !defined('PUBLICPATH') )
    define('PUBLICPATH', dirname(__FILE__, 2) . '/public/');

if ( !defined('BASEPATH') )
    define('BASEPATH', '/sale-system/public/');

if ( !defined('STYLEPATH') )
    define('STYLEPATH', '/sale-system/');

define('HEADER_TEMPLATE', PUBLICPATH . 'include/header.php');
define('FOOTER_TEMPLATE', PUBLICPATH . 'include/footer.php');

function __autoload($class) {
    $class = BASEURL . str_replace('\\', DS, $class) . '.php';

    if (!file_exists($class)) {
        throw new Exception("File path $class not found.");
    }

    require_once($class);
}

function clear_messages() {
    $_SESSION['message'] = "";
    $_SESSION['type'] = "";
}

?>