<?php
require '../core/connect.php';
session_start();

?>
<head>
    <title></title>
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/css/colors.css">
</head>
<body>
<div class="grid-container">

    <!-- Header -->
    <header class="header-class">
        <?php require '../template/header.php'; ?>
    </header>

    <!-- Side Panel -->
    <aside class="side-panel">
        <?php require '../template/sidePanel.php'; ?>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <?php
        if (isset($_GET['content'])) {
            $content = $_GET['content'];

            // Dinamički uključite odgovarajući template
            switch ($content) {
                case 'settings':
                    require '../template/settings.php';
                    break;
                case 'about':
                    require '../template/about.html';
                    break;
                case 'account':
                    require '../template/account.php';
                    break;
                case 'post':
                    require '../template/post.php';
                    break;
                default:
                    echo 'Stranica nije pronađena.';
            }
        }else {
            // Podrazumevani sadržaj
            require '../template/contentMain.php';
        }
        ?>
    </main>

    <!-- Footer -->
    <footer class="footer-class">
        <?php require '../template/footer.php'; ?>
    </footer>

</div>
</body>