<?php
global $pdo;
require '../core/connect.php';
require '../models/blogModel.php';

$posts = getAllPosts($pdo);

foreach ($posts as $post) {
    require 'card.php';
}

