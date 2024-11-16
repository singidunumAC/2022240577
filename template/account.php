<?php
global $pdo;
require '../core/connect.php';
require '../models/userModel.php';
session_start();

?>
<div class="settings-container">
    <h1>Account</h1>
    <?php
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        echo 'ID korisnika: ' . $userId, '<br>';
        echo 'Ime korisnika: ', userinfo($pdo, $userId);
    } else {
        echo 'Korisnik nije prijavljen.';
    }
    ?>
</div>