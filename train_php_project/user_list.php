<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $website_title = "List of users";
        require "blocks/head.php"; 
    ?>
</head>
<body>
    <?php require "blocks/header.php"; ?>

   <main>
        <h2>List of users</h2>
        <?php 
        require_once "ajax/mysql.php";
        $res = $pdo->query("SELECT * FROM users");
        while($row = $res->fetch(PDO::FETCH_OBJ)) {
            $float = $row->id;
            echo "<div id='block_$row->id' class='list_block'><span><b>Name: </b> $row->name, <b>login: </b> $row->login</span> <button id='delete_user_$row->id' onclick=\"deleteUser('$row->id')\">Delete</button></div>";
        }
        ?>
   </main>

   <?php require "blocks/aside.php"; ?>
   <?php require "blocks/footer.php"; ?>
   <script>
    function deleteUser(id) {
        $.ajax({
            url: 'ajax/user_list.php',
            type: 'POST',
            cache: false,
            data: {"id": id},
            dataType: 'html',
            success: function(data) {
                if(data === "Done") {
                    $("#delete_user_" + id).parent().remove();
                }
            }
        });
    };
   </script>
</body>
</html>