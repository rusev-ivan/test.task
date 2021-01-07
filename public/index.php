<?php
require __DIR__ . '/../vendor/autoload.php';

$url = $_SERVER ['REQUEST_URI'];
$parts = explode('/', $url);

$ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';
$class = 'App\Controllers\\' . $ctrl;

$ctrl = new $class;
$ctrl();
