<?php
session_start();
require '../core/connect.php';
require '../models/blogModel.php';

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = $_POST['comment'];
    $postId = $_GET['id'];
    addComment($pdo, $postId, $userId, $comment);
}
?>
<div class="postPage">
    <?php

    if (isset($_GET['id'])) {
        $postId = $_GET['id'];

        $post = getPostByid($pdo, $postId);
        if ($post) {
            echo '<h2 class="postTitle">' . htmlspecialchars($post['name']) . '</h2>';
            echo '<p class="postText">' . nl2br(htmlspecialchars($post['body'])) . '</p>';
        } else {
            echo 'Post nije pronađen.';
        }
    } else {
        echo 'ID posta nije prosleđen.';
    }
    $count = $post['upVote'] - $post['downVote'];
    ?>
    <div class="card-footer">
        <div class="cardVotes">
            <button class="upVote">
                <?= htmlspecialchars($post['upVote']); ?>
            </button>
            <div class="voteCount">
                <?= htmlspecialchars($count); ?>
            </div>
            <button class="downVote">
                <?= htmlspecialchars($post['downVote']); ?>
            </button>
        </div>
        <div class="coments">
            <p>Coments</p>
        </div>
        <div class="autor">
            Autor: <?= htmlspecialchars($post['autor']); ?>
        </div>
    </div>
</div>
<div class="addComment-">
    <form method="post">
        <label for="comment"></label>
        <input class="addComment" type="text" id="comment" name="comment" placeholder="Add a comment" required>
        <button type="submit">Add Comment</button>
    </form>
</div>



<?php
$comments = getCommentForPost($pdo, $postId);

foreach ($comments as $comment) {
    require '../template/comment.php';
}
?>
