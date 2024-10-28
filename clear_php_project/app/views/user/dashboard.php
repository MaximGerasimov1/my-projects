<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Кабинет пользователя</title>
    <meta name="description" content="Кабинет пользователя">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/user.css" charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1>Кабинет пользователя</h1>
        <div class="user-info">
            <p>Привет, <b><?=$data['name']?></b></p>
            <form action="/user/dashboard" method="POST" enctype="multipart/form-data">
                <div class="image-error">
                    <?php if(isset($data['message'])): ?>
                    <p class="error-message">
                        <?php $data['message'] ?>
                    </p>
                    <?php endif; ?>
                </div> <!-- div для отображение ошибки если пользователь не загрузил фотку -->
                <input type="file" name="image-file" accept="image/*" required>
                <button class="btn load" type="submit">Загрузить</button>
                <img src="/public/user_account_img/<?= $data['image'] ?>" alt="Picture for user account">
            </form>

            <form action="/user/dashboard" method="POST">
                <input type="hidden" name="exit_btn">
                <button class="btn" type="submit">Выйти</button>
            </form>
        </div>
    </div>

    <?php require 'public/blocks/footer.php' ?>
</body>
</html>