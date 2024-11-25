<?php
if (!isset($_SESSION['userId'])) {
    ?>
    <div class="header-container">
        <img src="../static/img/logo.jpg" alt="logo" class="logo"/>
        <label id="search-bar">
            <input type="text" class="search-bar" placeholder="Search...">
        </label>
        <a href="../public/login.php" class="login-button">Log in</a>
    </div>
    <?php
} else {
    ?>
    <div class="header-container">
        <img src="../static/img/logo.jpg" alt="logo" class="logo"/>
        <label id="search-bar">
            <input type="text" class="search-bar" placeholder="Search...">
        </label>
        <a href="../public/index.php?content=newPost" class="login-button">New post</a>
    </div>
    <?php
}
?>