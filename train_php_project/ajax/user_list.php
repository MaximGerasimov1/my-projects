<?php 
    $id = trim(filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS));

    require_once "mysql.php";
    $res = $pdo->prepare("DELETE FROM users WHERE id LIKE :id");
    $success =  $res->execute(['id' => $id]);
    
    if($success) {
        echo "Done";
    } else {
        echo "Error";
    }