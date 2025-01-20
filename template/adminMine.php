<?php
global $pdo;
require '../core/connect.php';
require '../models/blogModel.php';

if (!empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $posts = searchPosts($pdo, $searchTerm);
} else {
    $posts = getAllPosts($pdo);
}

foreach ($posts as $post) {
    require 'card.php';
}

