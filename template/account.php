<?php
global $pdo;
require '../core/connect.php';
require '../models/userModel.php';
require '../models/blogModel.php';
session_start();

?>
<div class="settings-container">
    <h1>Settings</h1>
</div>
<?php
if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    echo 'ID korisnika: ' . $userId, '<br>';
    echo 'Ime korisnika: ', userinfo($pdo, $userId);
} else {
    echo 'Korisnik nije prijavljen.';
}
?>
<h1> My posts </h1>
<?php
$posts = getPost($pdo, $userId);

foreach ($posts as $post) {
    require 'card.php';
}
?>


