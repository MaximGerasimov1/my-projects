<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $website_title = "Error page";
        require "blocks/head.php"; 
    ?>
</head>
<body>
    <?php require "blocks/header.php"; ?>

    <main>
    <p>Error 404! Go to the <a href="/index.php">main page</a>.</p>
    </main>

    <?php require "blocks/aside.php"; ?>
    <?php require "blocks/footer.php"; ?>
</body>
</html>