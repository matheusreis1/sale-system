<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DB_NAME', 'sale_system');

define('DB_USER', 'root');

define('DB_PASSWORD', 'password');

define('DB_HOST', 'localhost');

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

if ( !defined('BASEURL') )
    define('BASEURL', '/sale-system/public/');
    
if ( !defined('STYLEPATH') )
    define('STYLEPATH', dirname(__FILE__, 2) . '/public/');

define('HEADER_TEMPLATE', STYLEPATH . 'include/header.php');
define('FOOTER_TEMPLATE', STYLEPATH . 'include/footer.php');

?>