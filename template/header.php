<div class="header-container">
    <img src="../static/img/logo.jpg" alt="logo" class="logo"/>
    <form method="GET" action="../public/index.php" id="search-bar">
        <input
                type="text"
                class="search-bar"
                name="search"
                placeholder="Search posts..."
                value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    </form>
    <?php if (!isset($_SESSION['userId'])) { ?>
        <a href="../public/login.php" class="login-button">Log in</a>
    <?php } else { ?>
        <a href="../public/index.php?content=newPost" class="login-button">New post</a>
    <?php } ?>
</div>