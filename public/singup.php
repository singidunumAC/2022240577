<?php
global $pdo;
session_start();
require '../core/connect.php';
require '../controllers/authController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['name'];
    $password = $_POST['password'];

}
?>
<head>
    <title></title>
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/css/colors.css">
</head>
<body class="login-form">
<div class="login-box">
    <div id="login-for">
        <form method="post" action="login.php">
            <div class="text">
                <h2 class="login-h2">Sing up</h2>
            </div>
            <div class="form-group">
                <input class="name" name="name" placeholder="Name or ID">
            </div>
            <div class="form-group">
                <a class="logIn-singUp-button" href="login.php">generate id</a>
            </div>
            <div class="form-group">
                <input type="password" class="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" value="Sing Up" class="login">
            </div>
            <div class="login-singup-button">
                <a class="logIn-singUp-button" href="login.php">log in</a>
            </div>
        </form>

    </div>
</div>
</body>
