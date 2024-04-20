<?php
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/controller/',
        __DIR__ . '/model/',
        __DIR__ . '/../core/',
        __DIR__ . '/../model/' // Agregamos esta línea para incluir el directorio model/
    ];
    foreach ($paths as $path) {
        if (file_exists($path . $class . '.php')) {
            require_once $path . $class . '.php';
        }
    }
});
