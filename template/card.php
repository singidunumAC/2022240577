<?php
if (isset($post)) {
    $count = $post['upVote'] - $post['downVote'];
}
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

