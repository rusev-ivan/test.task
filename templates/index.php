<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css?<?php echo time(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Task</title>
</head>
<body class="text-center">
<div class="title">
    <h1 class="font-weight-normal">Welcome to registration</h1>
</div>
<div>
    <form class="form-reg" action="/regForm" method="post">
        <div class="form-group">
            <label for="name" class="control-label">Имя</label>
            <input type="text" name="name" class="form-control" placeholder="Имя"  autofocus required>
        </div>
        <div class="form-group">
            <label for="surname" class="control-label">Фамилия</label>
            <input type="text" name="surname" class="form-control" placeholder="Фамилия" required>
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email address" required>
        </div>
        <div class="form-group">
            <label for="pass" class="control-label">Пароль</label>
            <input type="password" name="pass" class="form-control" placeholder="Пароль" required>
        </div>
        <div class="form-group">
            <label for="passRetry" class="control-label">Повтор пароля</label>
            <input type="password" name="passRetry" class="form-control" placeholder="Повтор пароля" required>
        </div>
        <button class="btn btn-lg btn-primary">Регистрация</button>
    </form>
</div>
<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/main.js?<?php echo time(); ?>"></script>
</body>
</html>
