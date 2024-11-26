<?php
session_start();
require_once '../core/connect.php';
require_once '../models/blogModel.php';


function addNewPost($pdo, $name, $body, $category) {
    $userId = $_SESSION['userId'];
    newPost($pdo, $name, $body, $userId, $category);

}
