<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$data['title']?></title>
    <meta name="description" content="<?=$data['title']?>">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/pagination.css" charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container main">
        <h1><?=$data['title']?></h1>
        <div class="products">
            <?php for($i = 0; $i < count($data['products']); $i++): ?>
                <div class="product">
                    <div class="image">
                        <img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
                    </div>
                    <h3><?=$data['products'][$i]['title']?></h3>
                    <p><?=$data['products'][$i]['anons']?></p>
                    <a href="/product/<?=$data['products'][$i]['id']?>"><button class="btn">Детальнее</button></a>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="pagination container">
        <?php if ($data['totalPages'] > 1): ?>
            <?php if ($data['currentPage'] > 1): ?>
                <button class="pagination_btn"><a href="/categories/index/<?= $data['currentPage'] - 1 ?>">« Назад</a><button>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                <?php if ($i == $data['currentPage']): ?>
                    <button id="numeric__button"><span class="current-page"><?= $i ?></span></button>
                <?php else: ?>
                    <?php if ($data['currentPage'] != $i): // Проверяем, что текущая страница не равна i ?>
                        <button class="pagination_numeric"><a class="pagination_btn" href="/categories/index/<?= $i ?>"><?= $i ?></a></button>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($data['currentPage'] < $data['totalPages']): ?>
                <button class="pagination_btn"><a href="/categories/index/<?= $data['currentPage'] + 1 ?>">Вперед »</a></button>
            <?php endif; ?>
        <?php endif; ?>
    </div>


    <?php require 'public/blocks/footer.php' ?>
</body>
</html>