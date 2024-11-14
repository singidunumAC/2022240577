<?php
global $pdo;
session_start();
require '../core/connect.php';
require '../controllers/authController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['name'];
    $password = $_POST['password'];

    loginUser($pdo, $input, $password);
}
?>
<head>
    <title></title>
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/css/colors.css">
</head>
<body class="login-form">
<div class="login-box">
    <form method="post" action="login.php">
        <div class="form-group">
            <input class="name" name="name" placeholder="Name or ID" >
        </div>
        <div class="form-group">
            <input type="password" class="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="login">
        </div>
    </form>
</div>
</body>