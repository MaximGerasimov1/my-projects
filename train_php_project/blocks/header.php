<header>
    <span class="logo">Blog Master</span>
    <nav>
        <a href="/index.php">Main page</a>
        <a href="/contacts.php">Contacts</a>
        <?php if(isset($_COOKIE['login'])): ?>
            <a href="/add-article.php">Add an article</a>
            <a href="/user_list.php" class="btn">List of users</a>
            <a href="/login.php" class="btn">User account</a>
        <?php else: ?>
            <a href="/login.php" class="btn">Authorization</a>
            <a href="/register.php" class="btn">Register</a>
        <?php endif; ?>
    </nav>
</header>