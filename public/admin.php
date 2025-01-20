<?php
require '../core/connect.php';
require '../models/userModel.php';
session_start();
$userId = $_SESSION['userId'];
$userad = useradmin($pdo, $userId);


if ($userad == null) {
    header('Location: ../public/index.php');
    exit();
} else {
    ?>
    <head>
        <title>Admin Statistika</title>
        <link rel="stylesheet" href="../static/css/style.css">
        <link rel="stylesheet" href="../static/css/colors.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
    <div class="grid-container">

        <header class="header-class">
            <?php require '../template/header.php'; ?>
        </header>

        <aside class="side-panel">
            <?php require '../template/sideAdmin.php'; ?>
        </aside>

        <main class="main-content">

            <?php
            if (isset($_GET['content'])) {
                $content = $_GET['content'];

                switch ($content) {
                    case 'account':
                        require '../template/account.php';
                        break;
                    case 'stats':
                        require '../template/grap.php';
                        break;
                    case 'allposts':
                        require '../template/adminMine.php';
                        break;
                    case 'frends':
                        require '../core/frends.php';
                        break;
                    case 'help':
                        require '../template/help.php';
                        break;
                    case 'about':
                        require '../template/about.html';
                        break;

                    default:
                        echo 'Stranica nije pronađena.';
                }
            } elseif (isset($_GET['search'])) { // Ako postoji parametar za pretragu
                require '../template/adminMine.php';
            } else {
                require '../template/adminMine.php';

            }
            ?>
        </main>

    </div>
    </body>
<?php }
?>