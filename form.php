<?php
$users = [
    ['email' => 'ivanov@mail.ru', 'id' => '0001', 'name' => 'Ivan'],
    ['email' => 'petrov@mail.ru', 'id' => '0002', 'name' => 'Petr'],
    ['email' => 'popova@mail.ru', 'id' => '0003', 'name' => 'Mariya'],
    ['email' => 'smirnov@mail.ru', 'id' => '0004', 'name' => 'Evgeniy'],
    ['email' => 'sudarev@mail.ru', 'id' => '0005', 'name' => 'Ilya'],
    ['email' => 'kozlova@mail.ru', 'id' => '0006', 'name' => 'Anastasiya'],
];

// Открываем файл для логирования
$file = fopen('log.txt', 'a');

// Валидация email
if (stristr($_POST['email'], '@') === false) {
    $status[] = 'error';
    $messages[] = 'В введенном email "' . $_POST['email'] . '" отсутствует символ @';
} else {
    $status[] = 'success';
}

// Проверка на совпадение введенных паролей
if ($_POST['pass'] === $_POST['passRetry']) {
    $status[] = 'success';
} else {
    $status[] = 'error';
    $messages[] = "\n" . 'Введенные пароли не совпадают';
}

//Проверка на существование введенного пользователя
$check = array_search($_POST['email'], array_column($users, 'email'));
if ($check === false) {
    $status[] = 'success';
    if (!in_array('error', $status)) {
        fwrite($file, 'Success: Создан новый пользователь с электронной почтой '. $_POST['email'] ."\r\n");
    }
} else {
    $status[] = 'error';
    $messages[] = "\n" . 'Пользователь с email "' . $_POST['email'] . '" уже существует';
    fwrite($file, 'Error: Пользователь с электронной почтной "'. $_POST['email'] . '" уже существует' . "\r\n");
}

$status = in_array('error', $status) ? 'error' : 'success'; // Проверка на наличие ошибок

// Возвращаем ответ
$data = ['status' => $status, 'messages' => $messages ?? null];
echo json_encode($data);

fclose($file); //закрываем текстовый документ

