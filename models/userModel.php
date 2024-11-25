<?php
require '../core/connect.php';

function findUserIdByUsernameOrId($pdo, $input) {
    $sql = "SELECT id FROM users WHERE name = :input OR id = :input";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':input', $input, PDO::PARAM_STR);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($users) {
        return $users[0]['id'];
    } else {
        return false;
    }
}
function findUserPassword($pdo, $userId){
    $sql = "SELECT password FROM users WHERE id = :input";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':input', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($users) {
        return $users[0]['password'];
    } else {
        return false;
    }
}

function generateRandomId($pdo) {
    do {
        $randomId = rand(1000000, 9999999);

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE id = ?");
        $stmt->execute([$randomId]);
        $exists = $stmt->fetchColumn() > 0;
    } while ($exists);

    return $randomId;
}

function checkIfusernameExists($pdo, $input) {
    $sql = "SELECT name FROM users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $check = false;

    foreach ($users as $user) {
        if ($input == $user['name']) {
            $check = true;
        }
    }
    return $check;
}

function addUserToBase($pdo, $input, $pass){
    $id = generateRandomId($pdo);
    $name = $input;
    $password = $pass;


    $sql = "INSERT INTO users (`id`, `name`, `password`) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id, $name, $password]);

    echo "korisnik dodat: ID = $id, Name = $name";
    $_SESSION['userId'] = $id;
    header("Location: ../public/index.php");
}

function userinfo($pdo, $input) {
    $sql = "SELECT * FROM users WHERE id = (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$input]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        return $user['name'];
    } else {
        return null;
    }
}
