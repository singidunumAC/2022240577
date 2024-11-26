<?php
global $pdo;
require '../core/connect.php';
require '../models/userModel.php';
require '../models/blogModel.php';
session_start();

$userInfo = userinfo($pdo, $userId);

if ($userInfo === null) {
    $name = 'nobody';
} else {
    $name = $userInfo;

}
if (isset($_GET['id'])) {
    $autorId = $_GET['id'];
}
?>
<div class="settings-container">
    <h2>Account</h2>
    <p class="accInfo">
        Id : <?= htmlspecialchars($autorId); ?>
    </p>
    <p class="accInfo">
        Name : <?= htmlspecialchars($name); ?>
    </p>

</div>

<h2> Posts </h2>
<?php
$posts = getPost($pdo, $autorId);

foreach ($posts as $post) {
    require '../template/card.php';
}
?>


