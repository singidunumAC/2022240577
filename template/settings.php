<?php
global $pdo;
require '../core/connect.php';
require '../models/userModel.php';
session_start();
if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    echo 'ID korisnika: ' . $userId, '<br>';
    echo 'Ime korisnika: ', userinfo($pdo, $userId);
} else {
    echo 'Korisnik nije prijavljen.';
}
?>
<div class="settings-container">
    <h1>Settings</h1>
</div>