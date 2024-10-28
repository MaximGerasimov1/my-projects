<?php 
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS));
    $anons = trim(filter_var($_POST['anons'], FILTER_SANITIZE_SPECIAL_CHARS));
    $full_text = trim(filter_var($_POST['full_text'], FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';
    if(strlen($title) < 5)
        $error = 'Enter the title of article';
    else if(strlen($anons) < 15)
        $error = 'Enter the announcement of the article';
    else if(strlen($full_text) < 15)
        $error = 'Enter the main text of the artcile';

    if($error != '') {
        echo $error;
        exit();
    }

    require_once "mysql.php";

    $sql = 'INSERT INTO articles(title, anons, full_text, date, author) VALUES (?, ?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$title, $anons, $full_text, time(), $_COOKIE['login']]);

    echo "Done";