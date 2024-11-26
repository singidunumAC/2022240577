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
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
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
            <form method="post" action="../controllers/voteControllerPost.php">
                <input type="hidden" name="post_id" value="<?= htmlspecialchars($post['id']); ?>">
                <input type="hidden" name="vote_type" value="up">
                <button type="submit" class="upVote">
                    <?= htmlspecialchars($post['upVote']); ?>
                </button>
            </form>
            <div class="voteCount">
                <?= htmlspecialchars($count); ?>
            </div>
            <form method="post" action="../controllers/voteControllerPost.php">
                <input type="hidden" name="post_id" value="<?= htmlspecialchars($post['id']); ?>">
                <input type="hidden" name="vote_type" value="down">
                <button type="submit" class="downVote">
                    <?= htmlspecialchars($post['downVote']); ?>
                </button>
            </form>
        </div>
        <div class="coments">
            <p><?= htmlspecialchars(getCommentCountForPost($pdo, $post['id'])); ?> Coments</p>
        </div>
        <div class="autorT">
            <a href="../public/index.php?content=profil&id=<?= urlencode($post['autor']); ?>">
                Autor: <?= htmlspecialchars($post['autor']); ?>
            </a>
        </div>
    </div>
</div>
<div class="addComment-">
    <form method="post">
        <label for="comment"></label>
        <input class="addComment" type="text" id="comment" name="comment" placeholder="Add a comment" required>
    </form>
</div>



<?php
$comments = getCommentForPost($pdo, $postId);

foreach ($comments as $comment) {
    require '../template/comment.php';
}
?>
