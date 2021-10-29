<?php

/**
 * framework\core\initialize.php
 * 初始化設定
 */


/** 定義常用字元 */
define('DS', DIRECTORY_SEPARATOR);
define('BR', PHP_EOL);


/** 定義常用路徑 */
// [根目錄]
define('ROOT_PATH', dirname(dirname(__DIR__)) . DS);

// [二級目錄]
define('FRAMEWORK_PATH', dirname(__DIR__) . DS);

// [三級目錄]
define('APP_PATH', FRAMEWORK_PATH . 'app' . DS);
define('CORE_PATH', FRAMEWORK_PATH . 'core' . DS);
define('PUBLIC_PATH', FRAMEWORK_PATH . 'public' . DS);
define('RESOURCE_PATH', FRAMEWORK_PATH . 'resources' . DS);
define('STORAGE_PATH', FRAMEWORK_PATH . 'storage' . DS);
define('COMPOSER_PATH', FRAMEWORK_PATH . 'vendor' . DS);

// [其他目錄]
define('APP_CONFIG_PATH', APP_PATH . 'configs' . DS);
define('APP_COM_PATH', APP_PATH . 'components' . DS);

define('CORE_CONFIG_PATH', CORE_PATH . 'configs' . DS);
define('CORE_LIB_PATH', CORE_PATH . 'libraries' . DS);
define('CORE_CLASS_PATH', CORE_LIB_PATH . 'classes' . DS);
define('CORE_FUNC_PATH', CORE_LIB_PATH . 'function' . DS);

define('PUB_UPLOAD_PATH', PUBLIC_PATH . 'upload' . DS);
define('PUB_NPM_PATH', PUBLIC_PATH . 'node_modules' . DS);

define('RES_DB_PATH', RESOURCE_PATH . 'database' . DS);
define('RES_LOCAL_PATH', RESOURCE_PATH . 'locales' . DS);

define('TEMP_PATH', STORAGE_PATH . 'tmp' . DS);
define('LOG_PATH', STORAGE_PATH . 'logs' . DS);


/** 設定應用記憶體限制 */
ini_set('memory_limit', '16M');


/** 設定應用時區 */
date_default_timezone_set('Asia/Taipei');


/** 定義環境除錯及設定 */
define('DEBUG_ON', TRUE);
define('ENV_PRD', FALSE);

error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
ini_set('log_errors', TRUE);
ini_set('error_log', LOG_PATH . date('Y-m-d') . '.log');

if (ENV_PRD === FALSE && DEBUG_ON === TRUE) {
  ini_set('display_errors', TRUE);
  ini_set('display_startup_errors', TRUE);
} else {
  ini_set('display_errors', FALSE);
  ini_set('display_startup_errors', FALSE);
}


/** Framework Dependencies */
require_once COMPOSER_PATH . 'autoload.php';

/** Framework Configuration */
foreach (glob(CORE_CONFIG_PATH . '*.php') as $filename) {
  require_once $filename;
}

/** Framework Classes
 * 注意： 類別必須符合 PSR-0 所規範的命名方式。
 * 規範： 作者\命名空間\類別
 * 例如： Ethan\Database\sqlite
 */
spl_autoload_extensions('.php,.inc');
spl_autoload_register(function ($class) {
  require_once CORE_CLASS_PATH . strtolower($class) . '.php';
});

/** Framework Functioin */
foreach (glob(CORE_FUNC_PATH . '*.php') as $filename) {
  require_once $filename;
}

/** Session */
session_start();
