<?php
global $pdo;
require '../core/connect.php';
require '../models/userModel.php';
require '../models/blogModel.php';
session_start();
if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $name = userinfo($pdo, $userId);

}
?>
<div class="settings-container">
    <h2>Settings</h2>
    <p>
        Id : <?= htmlspecialchars($userId); ?>
    </p>
    <p>
        Name : <?= htmlspecialchars($name); ?>
    </p>
</div>

<h2> My posts </h2>
<?php
$posts = getPost($pdo, $userId);

foreach ($posts as $post) {
    require 'card.php';
}
?>


