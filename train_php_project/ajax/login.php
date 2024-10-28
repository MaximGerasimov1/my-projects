<?php 
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
    $pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';
    if(strlen($login) < 3)
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

    $sql = 'SELECT id FROM users WHERE `login` = ? AND `password` = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$login, $pass]);

    if($query->rowCount() == 0)
        echo "There is no such user";
    else {
        setcookie('login', $login, time() + 3600 * 24 * 30, "/");
        echo "Done";
    }
