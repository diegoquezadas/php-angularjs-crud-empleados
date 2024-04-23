<?php
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/controller/',  
        __DIR__ . '/model/',       
        __DIR__ . '/../core/'     
        ];
    foreach ($paths as $path) {
        $filepath = $path . $class . '.php';
        if (file_exists($filepath)) {
            require_once $filepath;
            error_log("Cargado: " . $filepath); 
        }
    }
});

