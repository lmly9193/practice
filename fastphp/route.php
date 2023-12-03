<?php

declare(strict_types=1);

$rt = explode('/', parse_url(substr($_SERVER['REQUEST_URI'], 1), PHP_URL_PATH));

/**
 * 簡易路由
 * http://fastphp.local/app/do
 */
if (ROUTE_MODE == 'simple') {

    if (empty(($rt[0])) || !file_exists(PATH_APP . $rt[0] . CHAR_DS)) {
        $app = "home";
    } else {
        $app = $rt[0];
    }

    if (empty($rt[1]) || !file_exists(PATH_APP . $rt[0] . CHAR_DS . $rt[1] . '.php')) {
        $do = "index";
    } else {
        $do = $rt[1];
    }

    require_once PATH_APP . $app . '/' . $do . '.php';
}

/**
 * 遞迴路由
 * http://fastphp.local/.../do
 * 如果相同的檔案和資料夾名稱同時存在，則會優先響應資料夾下的index.php
 */
if (ROUTE_MODE == 'recursive') {

    $path = PATH_APP . implode('/', $rt);
    $file = $path . '.php';

    if (file_exists($path . '/index.php')) {
        return require_once $path . '/index.php';
    } elseif (file_exists($file)) {
        return require_once $file;
    } else {
        return require_once PATH_APP . 'home/index.php';
    }
}
