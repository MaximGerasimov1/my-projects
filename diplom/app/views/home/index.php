<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
    <meta name="description" content="главная страница портала Сокра.тим">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/links.css">
    <script src="https://kit.fontawesome.com/34c451770e.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once 'public/blocks/header.php'?>

    <div class="container main">
        <h1>Сокра.тим</h1>
        <?php if($_COOKIE['login']): ?>
            <p>Вам нужно сократить ссылку? Сейчас мы это сделаем!</p>
            <form action="/" method="POST">
                <input type="text" name="long_link" placeholder="Длинная ссылка" required>
                <input type="text" name="short_link" placeholder="Короткое название" required>
                <div class="error-mess"><?=$data['message']?></div>
                <button type="submit">Уменьшить</button>
            </form>
            <?php if(count($data['links'])): ?>
                <h2>Сокращенные ссылки</h2>
                <?php for($i = 0; $i < count($data['links']); $i++): ?>
                    <div class="main_links">
                        <p style="margin-bottom: 0px; color: #626262" id="links_p_links"><b>Длинная: </b><span style="color: #000">
                                <?=$data['links'][$i]['full_url']?></span><br>
                            <b>Короткая: </b>
                            <a style="text-decoration: none; font-weight: 600" href="<?=$data['links'][$i]['full_url']?>"><?= $data['links'][$i]['short_code']?></a>
                        </p>
                        <form style="margin-top: 7px; margin-bottom: 5px" action="/" method="post">
                            <input type="hidden" name="delete_btn" value="<?=$data['links'][$i]['id']?>">
                            <button type="submit" id="delete_btn" style="width: 120px; padding: 10px 8px;
                            text-align: center; font-size: 12px">Удалить<i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        <?php else: ?>
            <p >Вам нужно сократить ссылку? Прежде чем это сделать зарегистрируйтесь на сайте.</p>
            <form action="/" method="POST">
                <input type="email" name="email" placeholder="Введите email" value="<?=$_POST['email']?>">
                <input type="text" name="login" placeholder="Введите логин" value="<?=$_POST['login']?>">
                <input type="password" name="password" placeholder="Введите пароль" value="<?=$_POST['password']?>">
                <div class="error-mess"><?=$data['message']?></div>
                <button type="submit">Зарегистрироваться</button>
            </form>
            <p>Есть аккаунт? Тогда вы можете <a href="user/auth">авторизироваться</a>.</p>
        <?php endif; ?>
    </div>

    <?php require_once 'public/blocks/footer.php' ?>
</body>
</html>