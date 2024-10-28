<?php 
    $username = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';
    if(strlen($username) < 2)
        $error = 'Enter name';
    else if(strlen($email) < 5)
        $error = 'Enter email';
    else if(strlen($mess) < 10)
        $error = 'Enter message';

    if($error != '') {
        echo $error;
        exit();
    }

    $to = "maksimka_gerasimov_2017@mail.ru";
    $subject = "=?utf-8?B?".base64_encode("New training message from my first php project")."?=";
    $message = "User: $username.<br>$mess";
    $headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

    mail($to, $subject, $message, $headers);

    echo "Done";