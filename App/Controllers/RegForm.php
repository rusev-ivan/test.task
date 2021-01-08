<?php

namespace App\Controllers;

class RegForm
{
    private $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function __invoke()
    {

        // Открываем файл для логирования
        $file = fopen('log.txt', 'a');

        // Валидация email
        if (empty($_POST['email']) || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $status[] = 'error';
            $messages[] = 'Введенный email "' . $_POST['email'] . '" не валидный';
        } else {
            $status[] = 'success';
        }

        // Проверка на совпадение введенных паролей
        if (empty($_POST['pass']) || empty($_POST['passRetry'])) {
            $status[] = 'error';
            $messages[] = "\n" . 'Поле с паролем пустое';
        } elseif ($_POST['pass'] !== $_POST['passRetry']) {
            $status[] = 'error';
            $messages[] = "\n" . 'Введенные пароли не совпадают';
        } else {
            $status[] = 'success';
        }

        //Проверка на существование введенного пользователя
        $check = array_search($_POST['email'], array_column($this->users, 'email'));
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
    }
}