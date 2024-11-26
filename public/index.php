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

    <header class="header-class">
        <?php require '../template/header.php'; ?>
    </header>

    <aside class="side-panel">
        <?php require '../template/sidePanel.php'; ?>
    </aside>

    <main class="main-content">
        <?php
        if (isset($_GET['content'])) {
            $content = $_GET['content'];

            switch ($content) {
                case 'account':
                    require '../template/account.php';
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
                case 'newPost':
                    require '../template/newPost.php';
                    break;
                case 'post':
                    require '../template/post.php';
                    break;
                case 'profil':
                    require '../core/pofil.php';
                    break;
                case 'category':
                    require '../core/categoryView.php';
                    break;
                default:
                    echo 'Stranica nije pronađena.';
            }
        } elseif (isset($_GET['search'])) { // Ako postoji parametar za pretragu
            require '../template/contentMain.php';
        } else {
            require '../template/contentMain.php';
        }
        ?>
    </main>

</div>
</body>