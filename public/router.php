<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$file = __DIR__ . $path;

// Jika file statis ditemukan, biarkan PHP server menyajikannya.
if ($path !== '/' && is_file($file)) {
    return false;
}

// Jika URL merupakan folder yang memiliki index.html
if (is_dir($file) && is_file($file . '/index.html')) {
    readfile($file . '/index.html');
    exit;
}

// Selain itu, arahkan ke Front Controller.
require __DIR__ . '/index.php';
