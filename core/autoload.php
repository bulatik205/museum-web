<?php
spl_autoload_register(function ($className) {
    $baseDir = __DIR__ . '/src/';
    
    $path = str_replace('\\', '/', $className);
    $file = $baseDir . $path . '.php';
    
    if (file_exists($file)) {
        require $file;
    }
});