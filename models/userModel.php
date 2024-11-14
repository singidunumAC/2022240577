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
        echo 'No user found with that name or ID.';
    }
}
