<?php
    require_once "mysql.php";

    $sql = "SELECT * FROM chat ORDER BY `id`";
    $query = $pdo->prepare($sql);
    $query->execute();
    $messages = $query->fetchAll(PDO::FETCH_OBJ);

    if(count($messages) == 0) {
        echo '<div class="div__chat">There are no messages yet</div>';
        exit();
    }

    $html = '';
    foreach($messages as $el) 
        $html .= '<div class="chat__mess">' . '<h6>' . $el->author . '</h6>' . '<p>' . $el->message . '</p>' . '</div>';

    echo $html;