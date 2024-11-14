<?php
session_start();
require_once '../core/connect.php';
require_once '../models/userModel.php';

function loginUser($pdo, $input, $password)
{
    $userId = findUserIdByUsernameOrId($pdo, $input);

    $sql = "SELECT password FROM users WHERE id = :input";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':input', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $pass = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($pass) {
        //if (password_verify($password, $pass['password']))
        if ($password == $pass['password']) {
            echo 'Uspeo si!<br>';
            $_SESSION['userId'] = $userId;
            header("Location: ../public/testScreen.php");
            exit;
        } else {
            echo 'Netačna lozinka!<br>';
        }

    } else {
        echo 'Korisnik nije pronađen.<br>';
    }
}
