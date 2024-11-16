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
        if (password_verify($password, $pass)) {
            $_SESSION['userId'] = $userId;
            header("Location: ../public/index.php");
            exit;
        } else {
            echo $password, '<br>';
            echo $pass, '<br>';
            echo password_hash($password, PASSWORD_DEFAULT), '<br>';
            echo 'Netačna lozinka!<br>';
        }

    } else {
        echo 'Korisnik nije pronađen.<br>';
    }
}
function addUser($pdo, $input, $password1 , $password2) {
    $userEcsist = checkIfusernameExists($pdo, $input);

    if (!$userEcsist) {
        if ($password1 !== $password2) {
            $_SESSION['error'] = "Passwords do not match";
            echo 'ne mose to tako ';
        }else{
            addUserToBase($pdo, $input, password_hash($password1, PASSWORD_DEFAULT));
        }
    }else{
        echo 'user postoji u bazu';
    }



}


