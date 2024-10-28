<header>
    <div class="container top-menu">
        <div class="left-side">
            <img src="/public/img/cat.png" alt="Funny picture of cat">
            <span>Уберем все<br> лишнее из ссылки!</span>
        </div>
        <div class="nav">
            <?php if($_COOKIE['login']): ?>
                <a href="/">Главная</a>
                <a href="/contact/about">Про нас</a>
                <a href="/contact">Контакты</a>
                <a href="/user">Личный кабинет</a>
            <?php else: ?>
                <a href="/">Главная</a>
                <a href="/contact/about">Про нас</a>
                <a href="/contact">Контакты</a>
                <a href="/user/auth">Войти</a>
            <?php endif; ?>
        </div>
    </div>
</header>
