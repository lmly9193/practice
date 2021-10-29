<?php

/** 定義網址路徑 */
define('SITE_PROTOCOL', 'http');
define('BASE_DOMIN', 'localhost');
define('BASE_PATH', 'QuickStart');
define('BASE_URL', SITE_PROTOCOL . '://' . BASE_DOMIN . '/' . BASE_PATH . '/');

$uri = $_SERVER['REQUEST_URI'];
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$currenturl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];
