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
    </main>


</div>
</body>