<?php
//    error_reporting(E_ALL);
//    ini_set('display_errors', 1);
    require_once 'app/init.php';
    require 'vendor/autoload.php';

    $app = new App();
    // Создание объекта на основе ключевого класса App, в котором идет обработка url и вызов непосредственного
    // контроллера и метода с передаваемыми параметрами