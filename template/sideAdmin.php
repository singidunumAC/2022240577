<sidePanel>
    <div class="side-panel2">
        <div class="panel-section">
            <ul class="category-list">
                <li><a href="../public/admin.php">Home</a></li>
                <li><a href="../public/testScreen.php">Explore</a></li>

            </ul>
        </div>
        <div class="panel-section">
            <h3>Topics</h3>
            <ul class="category-list">
                <li><a href="../public/admin.php?content=<?= urlencode('stats'); ?>">Stats</a></li>
                <li><a href="../public/admin.php?content=<?= urlencode('allposts'); ?>">Science</a></li>

            </ul>
        </div>

        <div class="panel-section">
            <h3>Popular</h3>
            <ul class="popular-list">
                <li><a href="#">Top post</a></li>

            </ul>
        </div>

        <div class="panel-section">
            <h3>-------</h3>
            <ul class="popular-list">
                <li><a href="../public/admin.php?content=about">About</a></li>
                <li><a href="../public/admin.php?content=account">Account</a></li>
                <li><a href="../public/admin.php?content=frends">Friends</a></li>
                <li><a href="../public/admin.php?content=help">Help</a></li>
                <li><a href="../controllers/authController.php?action=logout">Sign out</a></li>
            </ul>

        </div>
        <h7>Copyright &copy trX4xxz All Rights Reserved.</h7>

</sidePanel>
