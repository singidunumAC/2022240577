<?php
function getPost($pdo, $userId) {
    $sql = "SELECT * FROM post WHERE autor = :autor";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['autor' => $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function addComment($pdo, $postId, $author, $body) {
    $sql = "INSERT INTO comments (post_id, author, body) VALUES (:post_id, :author, :body)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([
        'post_id' => $postId,
        'author' => $author,
        'body' => $body,
    ])){
        echo 'Comment added';
    }else {
        echo "Something went wrong";
    }
}

function newPost($pdo, $title, $body, $author) {
    $sql = "INSERT INTO post (name, body, autor) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$title, $body, $author])) {
        echo "Post uspešno dodat!";
    } else {
        echo "Greška pri dodavanju posta.";
    }
}

function deletePost($pdo, $id) {
    $sql = "DELETE FROM post WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

function deleteComment($pdo, $id) {
    $sql = "DELETE FROM comments WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

}
function getAllPosts($pdo) {
    $sql = "SELECT * FROM post ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPostByid($pdo, $Id) {
    $sql = "SELECT * FROM post WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $Id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getCommentForPost($pdo, $postId) {
    $sql = "SELECT * FROM comments WHERE post_id = :postId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['postId' => $postId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function updateVote($pdo, $commentId, $voteType, $userId)
{
    if (!isset($_SESSION['voted_comments'])) {
        $_SESSION['voted_comments'] = [];
    }

    if (in_array($commentId, $_SESSION['voted_comments'])) {
        exit;
    }

    $column = ($voteType === 'up') ? 'up' : 'down';
    $sql = "UPDATE comments SET $column = $column + 1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $commentId]);

    $_SESSION['voted_comments'][] = $commentId;

    return "Vaš glas je uspešno zabeležen.";
}
