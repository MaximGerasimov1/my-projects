# Интернет-магазин одежды

Добро пожаловать в проект интернет-магазина одежды, разработанный на чистом PHP с использованием паттерна проектирования MVC и принципов объектно-ориентированного программирования (ООП). Этот проект предназначен для демонстрации возможностей PHP и создания функционального веб-приложения.

## Оглавление

- [Описание](#описание)
- [Функциональные возможности](#функциональные-возможности)
- [Технологии](#технологии)
- [Структура проекта](#структура-проекта)
- [Как использовать](#как-использовать)

## Описание

Данный проект представляет собой интернет-магазин, где пользователи могут просматривать товары, добавлять их в корзину и оформлять заказы. Приложение построено с соблюдением принципов MVC, что позволяет разделить логику приложения на модели, представления и контроллеры, обеспечивая чистоту и удобство кода.

## Функциональные возможности

- Просмотр каталога товаров
- Фильтрация и сортировка товаров
- Добавление товаров в корзину
- Оформление заказа
- Регистрация и авторизация пользователей
- Управление профилем пользователя
- Административная панель для управления товарами и заказами

**В данном проекте реализован слудующий функционал:**
    1. Главная страница, на которой отображаются все товары
    2. Система регистрации и авторизации
    3. Страница контаков(для связи с тех поддержкой сайта) и страница "Про команию", где находится вся ифнормация о данной организации.
    4. Различные категории товаров с возможностью добавления их в корзину, а также удаления оттуда как по отдельности, так и все разом.
    5. Отдельная страница для каждого товара с подробной информацией о нём.
    6. Пагинация на главной странице. 
    7. Отображение оформленной страницы с ошибкой 404 при переходе на неверный url адрес.

## Технологии

- PHP 7.4
- MySQL
- HTML5/CSS3
- MVC
- ООП

## Структура проекта

* /app
    * /controllers
    * /core
    * /models
    * /views
    * .htaccess
    * init.php
* public
    * /blocks
    * /css
     /img
    * /user_account_img
* /vendor
* 404.php
* composer.json
* composer.lock
* composer.phar
* index.php
* README.md

## Как использовать

После установки вы можете начать использовать интернет-магазин, зарегистрировавшись или войдя в систему. Исследуйте каталог товаров, добавляйте товары в корзину и оформляйте заказы. Для администраторов доступна панель управления для управления товарами и заказами.

---

Спасибо за интерес к нашему проекту! Если у вас есть вопросы или предложения, не стесняйтесь обращаться.