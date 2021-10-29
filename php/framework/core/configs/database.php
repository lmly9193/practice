<?php

/**
 * framework\core\configs\database.php
 * 資料庫設定檔
 */

/** MySQL 或 MariaDB */
define('DB_HOST', 'localhost');
define('DB_USER', 'username');
define('DB_PASS', 'password');
define('DB_NAME', 'database');


/** SQLite */
define('DB_FILE', DB_RESOURCE_PATH . 'default.sqlite.db');
