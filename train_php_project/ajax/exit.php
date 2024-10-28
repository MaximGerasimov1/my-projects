<?php 
setcookie('login', '', time() - 3600 * 24 * 30, "/"); # Удаление cookie из браузера
unset($_COOKIE['login']); # Удаление некого значения из глобального массива cookie