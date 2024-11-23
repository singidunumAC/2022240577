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
    $stmt->execute([
        'post_id' => $postId,
        'author' => $author,
        'body' => $body,
    ]);
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