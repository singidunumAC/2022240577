<?php
global $pdo;
session_start();
require '../core/connect.php';
require '../controllers/authController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['userId'];
    $password = $_POST['oldpass'];
    $password1 = $_POST['password'];
    $password2 = $_POST['password2'];

    $message = changePassword($pdo, $userId, $password, $password1, $password2);
    echo $message;
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
        <form method="post" action="">
            <div class="text">
                <h2 class="login-h2">Change password</h2>
            </div>
            <div class="form-group">
                <input id="nameOrId" class="name" name="oldpass" placeholder="old password">
            </div>
            <div class="form-group">
                <input type="password" class="password" name="password" placeholder="New password">
            </div>
            <div class="form-group">
                <input type="password" class="password" name="password2" placeholder="Confirm new password">
            </div>
            <div class="form-group">
                <input type="submit" value="Change password" class="login">
            </div>
            <div class="login-singup-button">
                <a class="logIn-singUp-button" href="../public/index.php">go back</a>
            </div>
        </form>

    </div>
</div>
</body>
