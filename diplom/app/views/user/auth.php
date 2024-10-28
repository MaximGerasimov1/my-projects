<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <meta name="description" content="Страница авторизации на нашем портале">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/auth.css">
    <script src="https://kit.fontawesome.com/34c451770e.js" crossorigin="anonymous"></script>
</head>
<body>
<?php require_once 'public/blocks/header.php'?>

<div class="container main">
    <h1 id="auth_h1">Авторизация</h1>
    <p id="auth_p">Здесь вы можете авторизоваться на сайте</p>
    <form action="/user/auth" method="POST">
        <input type="text" name="login" placeholder="Введите логин" value="<?=$_POST['login']?>">
        <input type="password" name="password" placeholder="Введите пароль" value="<?=$_POST['password']?>">
        <div class="error-mess"><?=$data['message']?></div>
        <button type="submit" id="auth_button">Авторизоваться</button>
    </form>
</div>

<?php require_once 'public/blocks/footer.php' ?>
</body>
</html>

