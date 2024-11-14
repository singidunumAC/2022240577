<?php
session_start();
require_once '../core/connect.php';
require_once '../models/userModel.php';


class AuthController {
    public function logout() {
        session_unset();
        session_destroy();
        header("Location: ../public/index.php");
        exit;
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $authController = new AuthController();
    $authController->logout();
}

function loginUser($pdo, $input, $password)
{
    $userId = findUserIdByUsernameOrId($pdo, $input);

    $pass = findUserPassword($pdo, $userId);

    if ($pass) {
        //if (password_verify($password, $pass['password']))
        if ($password == $pass) {
            echo 'Uspeo si!<br>';
            $_SESSION['userId'] = $userId;
            header("Location: ../public/index.php");
            exit;
        } else {
            echo 'Netačna lozinka!<br>';
        }

    } else {
        echo 'Korisnik nije pronađen.<br>';
    }
}
