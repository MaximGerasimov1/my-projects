<!DOCTYPE html>
<html lang="ru">
<head>
    <?php 
        $website_title = "Registration";
        require "blocks/head.php";
    ?>
</head>
<body>
    <?php require "blocks/header.php"; ?>

   <main>
        <h1>Registration</h1>
        <form>
            <label for="username">Your name</label>
            <input type="text" name="username" id="username">

            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            
            <label for="login">Login</label>
            <input type="text" name="login" id="login">

            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            <div class="error-mess" id="error-block"></div>

            <button type="button" id="reg_user">Register</button>
        </form>
   </main>

   <?php require "blocks/aside.php"; ?>
   <?php require "blocks/footer.php"; ?>
   <script>
        $("#reg_user").click(() => {
            let name = $("#username").val();
            let email = $("#email").val();
            let login = $("#login").val();
            let pass = $("#password").val();

            $.ajax({
                url: 'ajax/reg.php',
                type: 'POST',
                cache: false,
                data: {
                    'username': name,
                    'email': email,
                    'login': login,
                    'password': pass
                },
                dataType: 'html',
                success: function(data) {
                    if(data === "Done") {
                        $("#reg_user").text("All is ready");
                        $("#error-block").hide();
                    }
                    else {
                        $("#error-block").show();
                        $("#error-block").text(data);
                    }
                }
            });
        });
   </script>
</body>
</html>