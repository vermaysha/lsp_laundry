<?php
defined('_IN_APP_') or die('access denied !'); // keep silent

// Database configuration
define('DBHOST', 'localhost'); // host mysql
define('DBUSER', 'root'); // user mysql
define('DBPASS', '123456'); // pass mysql
define('DBNAME', 'laundry_lsp'); // database name

// Site configuration
define('SITE_URL', 'http://sangcoders.test/laundry'); // alamat web

// Development workspace
// Menampilkan seluruh error selama proses dev
ini_set('display_errors', true);
error_reporting(E_ALL);

// Session configuration
session_name('LaundrySession');
session_set_cookie_params(3600*24*7, '/', '', false, true);
session_start(); // start the session
