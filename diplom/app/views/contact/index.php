<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Обратная связь</title>
    <meta name="description" content="На этой странице вы можете связаться с нашми!">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/contact.css">
    <script src="https://kit.fontawesome.com/34c451770e.js" crossorigin="anonymous"></script>
</head>
<body>
<?php require_once 'public/blocks/header.php'?>

<div class="container main">
    <h1 id="feedback">Обратная связь</h1>
    <p id="feedback_p">Напишите нам, если у вас есть вопросы</p>
    <form action="/contact" method="POST">
        <input type="text" name="name" placeholder="Введите имя" value="<?=$_POST['name']?>">
        <input type="email" name="email" placeholder="Введите email" value="<?=$_POST['email']?>">
        <input type="text" name="age" placeholder="Введите возраст" value="<?=$_POST['age']?>">
        <textarea name="message" id="feedback_textarea" placeholder="Введите само сообщение"><?=$_POST['message']?></textarea>
        <div class="error-mess"><?=$data['message']?></div>
        <button type="submit">Отправить</button>
    </form>
</div>

<?php require_once 'public/blocks/footer.php' ?>
</body>
</html>
