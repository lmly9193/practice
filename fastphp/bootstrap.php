<?php

declare(strict_types=1);

/**
 * Session
 */
session_start();

/**
 * 解析設定檔
 */
foreach (parse_ini_file(".env", TRUE) as $const => $value) {
    define($const, $value);
}

/**
 * 除錯設定
 */
defined('APP_DEBUG') or define('APP_DEBUG', FALSE);
if (APP_DEBUG == TRUE) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

/**
 * 記憶體限制
 */
ini_set('memory_limit', '16M');

/**
 * 設定應用時區
 */
date_default_timezone_set('Asia/Taipei');

/**
 * 定義常用字元
 */
define('CHAR_DS', DIRECTORY_SEPARATOR);
define('CHAR_SP', PATH_SEPARATOR);
define('CHAR_EOL', PHP_EOL);


/**
 * 定義路徑
 */
define('PATH_HOST', realpath($_SERVER['DOCUMENT_ROOT']) . CHAR_DS);
define('PATH_ROOT', dirname(PATH_HOST) . CHAR_DS);
define('PATH_PUBLIC', PATH_ROOT . 'public' . CHAR_DS);
define('PATH_UPLOAD', PATH_PUBLIC . 'upload' . CHAR_DS);
define('PATH_APP', PATH_ROOT . 'app' . CHAR_DS);

/**
 * 定義網站
 */
defined('APP_NAME') or define('APP_NAME', 'FastPHP');
defined('APP_URL') or define('APP_URL', 'http://' . $_SERVER['HTTP_HOST']);

/**
 * 定義路由模式
 * 接受的值: simple, recursive
 */
defined('ROUTE_MODE') or define('ROUTE_MODE', 'recursive');

/**
 * 連結資料庫
 */
defined('DB_HOST') or define('DB_HOST', 'localhost');
defined('DB_PORT') or define('DB_PORT', 3306);
defined('DB_DATABASE') or define('DB_DATABASE', 'fastphp');
defined('DB_USERNAME') or define('DB_USERNAME', 'root');
defined('DB_PASSWORD') or define('DB_PASSWORD', 'root');

try {
    $dbh = new \PDO(
        'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE . ';charset=utf8',
        DB_USERNAME,
        DB_PASSWORD,
        [
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]
    );
} catch (\PDOException $e) {
    echo '資料庫連接失敗：' . $e->getMessage();
}

/**
 * 當前網址
 */
define('CURRENT_URL', APP_URL . $_SERVER['REQUEST_URI']);

/**
 * IP地址
 */
if (isset($_SERVER)) {
    if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]) && ip2long($_SERVER["HTTP_X_FORWARDED_FOR"]) !== false) {

        define('CLIENT_IP', $_SERVER["HTTP_X_FORWARDED_FOR"]);
    } elseif (isset($_SERVER["HTTP_CLIENT_IP"])  && ip2long($_SERVER["HTTP_CLIENT_IP"]) !== false) {

        define('CLIENT_IP', $_SERVER["HTTP_CLIENT_IP"]);
    } else {

        define('CLIENT_IP', $_SERVER["REMOTE_ADDR"]);
    }
} else {
    if (getenv('HTTP_X_FORWARDED_FOR') && ip2long(getenv('HTTP_X_FORWARDED_FOR')) !== false) {

        define('CLIENT_IP', getenv('HTTP_X_FORWARDED_FOR'));
    } elseif (getenv('HTTP_CLIENT_IP') && ip2long(getenv('HTTP_CLIENT_IP')) !== false) {

        define('CLIENT_IP', getenv('HTTP_CLIENT_IP'));
    } else {

        define('CLIENT_IP', getenv('REMOTE_ADDR'));
    }
}

/**
 * 裝置判斷
 */
if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $_SERVER['HTTP_USER_AGENT']) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($_SERVER['HTTP_USER_AGENT'], 0, 4))) {
    define('CLIENT_DEVICE', 'mb');
} else {
    define('CLIENT_DEVICE', '');
}

/**
 * Pagenation configuration
 */
$pagedata = 10;
if (!isset($q['page']) || $q['page'] == NULL) {
    $currentpage = 1;
    $page = 1;
    $start = $page - 1;
} else {
    $currentpage = $q['page'];
    $page = $q['page'];
    $start = ($page - 1) * $pagedata;
};

/**
 * Function
 */
require_once __DIR__ . '/function.php';

/**
 * Classes
 */
foreach (glob(__DIR__ . '/class/*.class.php') as $filename) {
    require_once $filename;
}
