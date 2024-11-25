<?php
session_start();
require '../core/connect.php';
require '../models/blogModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commentId = $_POST['commentId'];
    $voteType = $_POST['voteType'];
    $userId = $_SESSION['id'];

    if (!isset($_SESSION['voted_comments'])) {
        $_SESSION['voted_comments'] = [];
    }

    if (in_array($commentId, $_SESSION['voted_comments'])) {

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $result = updateVote($pdo, $commentId, $voteType, $userId);

    $_SESSION['voted_comments'][] = $commentId;

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

