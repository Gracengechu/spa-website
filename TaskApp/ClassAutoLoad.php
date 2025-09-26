<?php
spl_autoload_register(function ($class) {
    // Look in TaskApp root
    $file = __DIR__ . '/' . $class . '.php';

    // If not found, look in Layouts subfolder
    if (!file_exists($file)) {
        $file = __DIR__ . '/Layouts/' . $class . '.php';
    }

    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Autoloader error: Class '$class' not found (expected file: $file)");
    }
});
