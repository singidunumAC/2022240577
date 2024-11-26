<?php
global $pdo;
require '../core/connect.php';
require '../models/blogModel.php';

// Provera da li postoji search parametar
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $posts = searchPosts($pdo, $searchTerm); // Funkcija za pretragu postova
} else {
    $posts = getAllPosts($pdo); // Prikaz svih postova
}

// Prolazak kroz postove i generisanje kartica
foreach ($posts as $post) {
    require 'card.php';
}
?>
