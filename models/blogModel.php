<?php
function getPost($pdo, $id) {
    $sql = "SELECT * FROM post WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($post) {
        return $post;
    } else {
        return null;
    }
}
function addComment($pdo, $postId, $author, $body) {
    $sql = "INSERT INTO comments (post_id, author, body) VALUES (:post_id, :author, :body)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'post_id' => $postId,
        'author' => $author,
        'body' => $body,
    ]);
}

function newPost($pdo, $title, $body, $author) {
    $sql = "INSERT INTO posts (title, body) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $body, $author]);
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