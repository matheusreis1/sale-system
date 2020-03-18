<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

function clear_messages() {
    $_SESSION['message'] = "";
    $_SESSION['type'] = "";
}

define('DB_NAME', 'sale_system');

define('DB_USER', 'root');

define('DB_PASSWORD', 'password');

define('DB_HOST', 'localhost');

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

if ( !defined('BASEURL') )
    define('BASEURL', dirname(__FILE__, 2) . '/');
    
if ( !defined('STYLEPATH') )
    define('STYLEPATH', dirname(__FILE__, 2) . '/public/');

if ( !defined('BASEPATH') )
    define('BASEPATH', '/sale-system/public/');

define('HEADER_TEMPLATE', STYLEPATH . 'include/header.php');
define('FOOTER_TEMPLATE', STYLEPATH . 'include/footer.php');

?>