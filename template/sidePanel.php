<sidePanel>
    <div class="side-panel2">
        <div class="panel-section">
            <ul class="category-list">
                <li><a href="../public/index.php">Home</a></li>
                <li><a href="../public/testScreen.php">Explore</a></li>

            </ul>
        </div>
        <div class="panel-section">
            <h3>Topics</h3>
            <ul class="category-list">
                <li><a href="../public/index.php?content=category&category=<?= urlencode('tehnology'); ?>">Technology</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('sience'); ?>">Science</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('sport'); ?>">Sport</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('bisnis'); ?>">Bisnies</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('music'); ?>">Music</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('entertaiment'); ?>">Entertainment</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('arts'); ?>">Arts</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('fasion'); ?>">Fasion</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('nature'); ?>">Nature</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('news'); ?>">News</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('vihicle'); ?>">Vehicles</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('tehnology'); ?>">Vehicles</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('tehnology'); ?>">Spooky</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('tehnology'); ?>">Books</a></li>
                <li><a href="../public/index.php?content=category&category=<?= urlencode('tehnology'); ?>">Other</a></li>
            </ul>
        </div>

        <div class="panel-section">
            <h3>Popular</h3>
            <ul class="popular-list">
                <li><a href="#">Top post</a></li>

            </ul>
        </div>
        <?php
        if (isset($_SESSION['userId'])) {
        ?>
        <div class="panel-section">
            <h3>-------</h3>
            <ul class="popular-list">
                <li><a href="../public/index.php?content=about">About</a></li>
                <li><a href="../public/index.php?content=account">Account</a></li>
                <li><a href="../public/index.php?content=frends">Friends</a></li>
                <li><a href="../public/index.php?content=help">Help</a></li>
                <li><a href="../controllers/authController.php?action=logout">Sign out</a></li>
            </ul>
            <?php
            } else {
            ?>
            <div class="panel-section">
                <h3>-------</h3>
                <ul class="popular-list">
                    <li><a href="../public/index.php?content=about">About</a></li>
                    <li><a href="../public/index.php?content=help">Help</a></li>
                </ul>
                <?php
                }
                ?>

        </div>
    </div>
        <h7>Copyright &copy trX4xxz All Rights Reserved.</h7>

</sidePanel>
