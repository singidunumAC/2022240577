<?php
global $pdo;
require '../core/connect.php';
require '../models/userModel.php';
require '../models/blogModel.php';
session_start();
if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $userInfo = userinfo($pdo, $userId); // Poziv funkcije samo jednom

    if ($userInfo === null) { // Provera da li je rezultat null
        $name = 'nobody';
    } else {
        $name = $userInfo;
    }
}
?>
<div class="settings-container">
    <h2>Settings</h2>
    <p class="accInfo">
        Id : <?= htmlspecialchars($userId); ?>
    </p>
    <p class="accInfo">
        Name : <?= htmlspecialchars($name); ?>
    </p>

    <a href="../core/changePassword.php"  class="changePass">
        change password
    </a>
</div>

<h2> My posts </h2>
<?php
$posts = getPost($pdo, $userId);

foreach ($posts as $post) {
    require 'card.php';
}
?>


