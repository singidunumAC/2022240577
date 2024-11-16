<?php
global $pdo;
session_start();
require '../core/connect.php';
require '../controllers/authController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $password1 = $_POST['password'];
    $password2 = $_POST['password2'];

    addUser($pdo, $name, $password1, $password2);
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
        <form method="post" action="singup.php">
            <div class="text">
                <h2 class="login-h2">Sing up</h2>
            </div>
            <div class="form-group">
                <input id="nameOrId" class="name" name="name" placeholder="Name(opcional)">
            </div>
            <div class="form-group">
                <input type="password" class="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="password" name="password2" placeholder="Confirm Password">
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
