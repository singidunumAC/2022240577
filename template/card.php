<?php
global $pdo;
require '../models/blogModel.php';
session_start();
$id = 1;
$post = getPost($pdo, $id);
$count = $post['upVote'] - $post['downVote'];
?>
<div class="card">
    <h3 class="card-title">
        <?= htmlspecialchars($post['name']);?>
    </h3>
    <p class="card-text">
        <?= nl2br(htmlspecialchars($post['body']));?>
    </p>
    <div class="cardVotes">
        <button class="upVote">
            <?= htmlspecialchars($post['upVote']);?>
        </button>
        <div class="voteCount">
            <?= htmlspecialchars($count);?>
        </div>
        <button class="downVote">
            <?= htmlspecialchars($post['downVote']);?>
        </button>
    </div>
    <div class="coment">
        Autor: <?= htmlspecialchars($post['autor']);?>
    </div>
</div>
