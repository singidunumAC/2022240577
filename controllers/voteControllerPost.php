<?php
session_start();
require '../core/connect.php';
require '../models/blogModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Id = $_POST['post_id'];
    $voteType = $_POST['vote_type'];
    $userId = $_SESSION['id'];

    if (!isset($_SESSION['voted_posts'])) {
        $_SESSION['voted_posts'] = [];
    }

    if (in_array($Id, $_SESSION['voted_posts'])) {

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $result = updatePostVote($pdo, $Id, $voteType, $userId);

    $_SESSION['voted_posts'][] = $Id;

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

