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
                <li><a href="#">Technology</a></li>
                <li><a href="#">Science</a></li>
                <li><a href="#">Sport</a></li>
                <li><a href="#">Bisnies</a></li>
                <li><a href="#">Music</a></li>
                <li><a href="#">Arts</a></li>
                <li><a href="#">Food and Drinks</a></li>
                <li><a href="#">Movie and TV</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Nature</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Vehicles</a></li>
                <li><a href="#">Spooky</a></li>
                <li><a href="#">Books</a></li>
                <li><a href="#">Other</a></li>
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
                <li><a href="#">About</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Setings</a></li>
                <li><a href="#">Account</a></li>
                <li><a href="#">Frends</a></li>
                <li><a href="../controllers/authController.php?action=logout">Sign out</a></li>
            </ul>
            <?php
            } else {
            ?>
            <div class="panel-section">
                <h3>-------</h3>
                <ul class="popular-list">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Setings</a></li>
                </ul>
                <?php
                }
                ?>

        </div>
    </div>
</sidePanel>