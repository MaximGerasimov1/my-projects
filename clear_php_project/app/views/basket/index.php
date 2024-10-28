<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина товаров</title>
    <meta name="description" content="Корзина товаров">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/products.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/only_button.css" charset="utf-8">
    <script src="https://kit.fontawesome.com/34c451770e.js" crossorigin="anonymous"></script>
</head>
<body>
<?php require 'public/blocks/header.php' ?>

<div class="container main">
    <h1>Корзина товаров</h1>
    <?php if(count($data['products']) == 0): ?>
        <p><?=$data['empty']?></p>
   <?php else: ?>
        <form action="/basket" method="post">
            <input type="hidden" name="delete_all">
            <button class="btn" id="delete_all_products" type="submit">Удалить все товары <i class="fa-solid fa-trash"></i></button>
        </form>
        <div class="products">
            <?php $sum = 0; for($i = 0; $i < count($data['products']); $i++): $sum += $data['products'][$i]['price']; ?>
                <div class="row">
                    <img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
                    <h4><?=$data['products'][$i]['title']?></h4>
                    <span><?=$data['products'][$i]['price']?> рублей</span>
                    <form action="/basket" method="POST">
                        <input type="hidden" name="delete_for_id" value="<?=$data['products'][$i]['id']?>">
                        <button class="btn" type="submit">Удалить из корзины <i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
            <?php endfor; ?>
            <form action="/basket/confirm" method="post">
                <input type="hidden" name="amount" value="<?=$sum?>">
                <button class="btn" type="submit">Приобрести (<b><?=$sum?> рублей</b>)</button>
            </form>
        </div>
    <?php endif; ?>
</div>

<?php require 'public/blocks/footer.php' ?>
</body>
</html>
