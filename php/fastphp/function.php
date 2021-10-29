<?php

declare(strict_types=1);

/**
 * 
 * @param string|null $key 
 * @return string|array 
 */
function request(string $key = null)
{
    if (!empty($key)) {

        $request = [];
        foreach ($_REQUEST as $k => $v) {
            $request[$k] = trim($v);
        }

        if (array_key_exists($key, $request)) {
            return (string) $request[$key];
        } else {
            return null;
        }
    } else {
        return $_REQUEST;
    }
}

function url(string $url = null)
{
    if (!empty($url)) {
        return (string) APP_URL . '/' . $url;
    }
}

/**
 * 
 * @return string 
 */
function ip()
{
    return (string) CLIENT_IP;
}

/**
 * 
 * @return string 
 */
function device()
{
    return (string) CLIENT_DEVICE;
}

/**
 * 
 * @return string 
 */
function today()
{
    return (string) date('Y-m-d');
}

/**
 * 
 * @return string 
 */
function now()
{
    return (string) date('Y-m-d H:i:s');
}

/**
 * 
 * @return string 
 */
function moment()
{
    return (string) date('H:i:s');
}


/**
 * 
 * @param mixed $weekday 
 * @return void 
 */
function weekday_tw($weekday)
{
    if ($weekday == 0) {
        echo '日';
    }
    if ($weekday == 1) {
        echo '一';
    }
    if ($weekday == 2) {
        echo '二';
    }
    if ($weekday == 3) {
        echo '三';
    }
    if ($weekday == 4) {
        echo '四';
    }
    if ($weekday == 5) {
        echo '五';
    }
    if ($weekday == 6) {
        echo '六';
    }
}

function memory()
{
    return (string) memory_get_usage();
}
