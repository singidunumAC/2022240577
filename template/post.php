<?php
session_start();
require '../core/connect.php';
require '../models/blogModel.php';

?>
<div class="postPage">
    <?php

    if (isset($_GET['id'])) {
        $postId = $_GET['id'];

        $post = getPostById($pdo, $postId);
        if ($post) {
            echo '<h2 class="postTitle">' . htmlspecialchars($post['name']) . '</h2>';
            echo '<p class="postText">' . nl2br(htmlspecialchars($post['body'])) . '</p>';
        } else {
            echo 'Post nije pronađen.';
        }
    } else {
        echo 'ID posta nije prosleđen.';
    }
    ?>

    <p class="postComents">
        komentari
    </p>

</div>
