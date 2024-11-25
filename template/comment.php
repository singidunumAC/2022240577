<?php
$countCom = $comment['up'] - $comment['down'];


?>

<div class="commentBox">
    <div class="cmInfo">
        <h4>
            <?= htmlspecialchars($comment['author']); ?>
        </h4>
        <p>
             -
        </p>
        <p>
            <?= htmlspecialchars($comment['created_at']); ?>
        </p>
    </div>
    <p class="commentBody">
        <?= htmlspecialchars($comment['body']); ?>

    </p>
    <div class="commentVotes">
        <div class="card-footer">
            <div class="cardVotesCom">
                <form action="../controllers/voteController.php" method="post" style="display: inline;">
                    <input type="hidden" name="commentId" value="<?= $comment['id']; ?>">
                    <input type="hidden" name="voteType" value="up">
                    <button type="submit" class="upVote">
                        <?= htmlspecialchars($comment['up']); ?>
                    </button>
                </form>
                <div class="voteCount"><?= htmlspecialchars($comment['up'] - $comment['down']); ?></div>
                <form action="../controllers/voteController.php" method="post" style="display: inline;">
                    <input type="hidden" name="commentId" value="<?= $comment['id']; ?>">
                    <input type="hidden" name="voteType" value="down">
                    <button type="submit" class="downVote">
                        <?= htmlspecialchars($comment['down']); ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
