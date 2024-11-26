<?php
if (isset($post)) {
    $count = $post['upVote'] - $post['downVote'];
}
$postId = $post['id'];

$commentCount = getCommentCountForPost($pdo, $postId);
?>
<div class="card">
    <h3 class="card-title">
        <a href="../public/index.php?content=post&id=<?= urlencode($post['id']); ?>">
            <?= htmlspecialchars($post['name']); ?>
        </a>
    </h3>
    <p class="card-text">
        <?= nl2br(htmlspecialchars($post['body'])); ?>
    </p>
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
        <div class="autorT">
            <a href="../public/index.php?content=">
                Category: <?= htmlspecialchars($post['category']); ?>
            </a>
        </div>
    </div>
</div>

