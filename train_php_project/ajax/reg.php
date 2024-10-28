<?php 
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
    $pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';
    if(strlen($username) < 2)
        $error = 'Enter name';
    else if(strlen($email) < 5)
        $error = 'Enter email';
    else if(strlen($login) < 3)
        $error = 'Enter login';
    else if(strlen($pass) < 5)
        $error = 'Enter password';

    if($error != '') {
        echo $error;
        exit();
    }

    require_once "mysql.php";

    $salt = 'wsej/kdgb(?o2j13nrlkednb)!vdflm#';
    $pass = md5($salt . $pass);

    $sql = 'INSERT INTO users(name, email, login, password) VALUES (?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$username, $email, $login, $pass]);

    echo "Done";