<?php
spl_autoload_register(function($class) {
    require_once _DIR_ . '/classes/' . $class . '.php';
});