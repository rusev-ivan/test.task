<?php

use App\Container;
use App\Controllers\RegForm;

require __DIR__ . '/../vendor/autoload.php';

$url = $_SERVER ['REQUEST_URI'];
$parts = explode('/', $url);

$ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';
$class = 'App\Controllers\\' . $ctrl;

$users = [
    ['email' => 'ivanov@mail.ru',  'id' => '0001', 'name' => 'Ivan'],
    ['email' => 'petrov@mail.ru',  'id' => '0002', 'name' => 'Petr'],
    ['email' => 'popova@mail.ru',  'id' => '0003', 'name' => 'Mariya'],
    ['email' => 'smirnov@mail.ru', 'id' => '0004', 'name' => 'Evgeniy'],
    ['email' => 'sudarev@mail.ru', 'id' => '0005', 'name' => 'Ilya'],
    ['email' => 'kozlova@mail.ru', 'id' => '0006', 'name' => 'Anastasiya'],
];

$container = new Container();
$container->bind(RegForm::class, function (Container $container) use ($users)
{
    return new RegForm($users);
});
$ctrl = $container->get($class);
$ctrl();
