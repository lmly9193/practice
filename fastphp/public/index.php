<?php

declare(strict_types=1);

define('TIME_START', microtime(true));

require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../route.php';

$time = microtime(true) - TIME_START;
$memory = memory();
echo <<<EOF
<script>
console.log('%c[警告] 你正在使用開發人員專用介面，操作不當可能會令你暴露在危險之中！\\n頁面歷時: $time (sec)\\n記憶體用量: $memory (byte)','color:red');
</script>
EOF;
