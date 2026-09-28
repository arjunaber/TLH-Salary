<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Vercel: hanya /tmp yang bisa ditulis
foreach (['app', 'framework/cache/data', 'framework/sessions', 'framework/views', 'logs'] as $d) {
    @mkdir('/tmp/storage/' . $d, 0777, true);
}
foreach (
    [
        'LOG_CHANNEL' => 'stderr',
        'APP_MAINTENANCE_DRIVER' => 'file',
        'SESSION_DRIVER' => 'cookie',
        'CACHE_STORE' => 'array',
        'APP_SERVICES_CACHE' => '/tmp/services.php',
        'APP_PACKAGES_CACHE' => '/tmp/packages.php',
        'VIEW_COMPILED_PATH' => '/tmp/storage/framework/views',
    ] as $k => $v
) {
    $_ENV[$k] = $_SERVER[$k] = $v;
    putenv("$k=$v");
}

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->useStoragePath('/tmp/storage');
$app->handleRequest(Request::capture());
