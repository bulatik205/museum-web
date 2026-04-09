<?php
$requestUri = $_SERVER['REQUEST_URI'];
$path = parse_url($requestUri, PHP_URL_PATH);

$path = trim($path, '/');

if (empty($path)) {
    $path = 'index';
}

$frameFilePHP = '/frames/' . $path . '.php';
$frameFileHTML = '/frames/' . $path . '.html';

if (file_exists($frameFilePHP) || file_exists($frameFileHTML)) {
    require $frameFile;
} else {
    echo $frameFilePHP;
    echo $frameFileHTML;
    require 'frames/not_found.html';
}