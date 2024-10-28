<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $website_title = "Blog Mster";
        require "blocks/head.php"; 
    ?>
</head>
<body>
    <?php require "blocks/header.php"; ?>

   <main>
        <?php 
        require_once "ajax/mysql.php";

        $sql = 'SELECT * FROM articles ORDER BY `date` DESC';
        $query = $pdo->query($sql);
        while($row = $query->fetch(PDO::FETCH_OBJ)) {
            echo "<div class='post'>
                <h1> $row->title </h1>
                <p> $row->anons </p>
                <p class='author'>Author: <span> $row->author </span></p>
                <a href='/post.php?id=" . $row->id . "' title=" . $row->title . "'>Read</a>
            </div>";
        }
        ?>
   </main>

   <?php require "blocks/aside_chat.php"; ?>
   <?php require "blocks/footer.php"; ?>
   <script>
        $("#send_chat").click(() => {
            let mess = $("#chat").val();
            let login = $("#aside_login").val();

            $.ajax({
                url: 'ajax/chat.php',
                type: 'POST',
                cache: false,
                data: {
                    'message': mess,
                    'login': login
                },
                dataType: 'html',
                success: function(data) {
                    if(data === "Done") {
                        
                        $("#send_chat").text("The message has been sent");
                        setTimeout(function() {
                            $("#send_chat").text("Send message");
                        }, 3000);
                        $("#chat").val('');
                        $("#error-block").hide();
                    }
                    else {
                        $("#error-block").show();
                        $("#error-block").text(data);
                    }
                }
            });
        });

        setInterval(function() {
            $.ajax({
                url: 'ajax/add_messages.php',
                type: 'POST',
                cache: false,
                dataType: 'html',
                success: function(data) {
                    $(".big_block").html(data);
                }
            });
        }, 3000);
   </script>
</body>
</html>