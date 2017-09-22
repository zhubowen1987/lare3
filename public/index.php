<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));
define('PUBLIC_LING', "http://blog.dev");
define('HOST', "http://blog.dev/");
define('PUBLIC_DIR',dirname(__FILE__));
define('TITLE',"卫生院系统");
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

//UsersController
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();

$kernel->terminate($request, $response);
