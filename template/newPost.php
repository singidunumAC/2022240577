<?php
global $pdo;
require '../core/connect.php';
require '../controllers/blogControler.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    addNewPost($pdo, $title, $body);
}
?>
<form method="post" action="" class="new-post-form">
    <div class="form-group">
        <label for="title">Naslov posta</label>
        <input type="text" id="title" name="title" placeholder="Unesite naslov" required>
    </div>

    <div class="form-group">
        <label for="body">Sadržaj posta</label>
        <textarea id="body" name="body" placeholder="Unesite sadržaj" rows="6" required></textarea>
    </div>

    <div class="form-group">
        <button type="submit">Dodaj post</button>
    </div>
</form>

