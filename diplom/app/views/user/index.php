<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Кабинет пользователя</title>
    <meta name="description" content="Эта страница является кабинетом пользователя на нашем сайте.">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/user.css">
    <script src="https://kit.fontawesome.com/34c451770e.js" crossorigin="anonymous"></script>
</head>
<body>
<?php require_once 'public/blocks/header.php'?>

<div class="container">
    <h1 id="user_account_h1">Кабинет пользователя</h1>
    <div class="user">
        <p id="user_account_p1">Привет, <b><?=$data['login']?></p></b></p>
        <form action="/user" method="post">
            <input type="hidden" name="exit_btn">
            <button type="submit" id="user_account_button">Выйти</button>
        </form>
    </div>
</div>

<?php require_once 'public/blocks/footer.php' ?>
</body>
</html>

