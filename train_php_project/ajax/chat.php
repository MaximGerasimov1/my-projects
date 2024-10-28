<?php
    $message = trim(filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';
    if(strlen($message) < 2)
        $error = 'Enter a message longer than 1 character';

    if($error != '') {
        echo $error;
        exit();
    }

    require_once "mysql.php";

    $sql = 'INSERT INTO chat(message, login) VALUES (?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$message, $login]);

    echo "Done";