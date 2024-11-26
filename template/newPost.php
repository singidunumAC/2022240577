<?php
global $pdo;
require '../controllers/blogController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $category = $_POST['category'];
    addNewPost($pdo, $title, $body, $category);
}
?>
<form method="post" action="" class="new-post-form">
    <div class="form-group">
        <label for="title">Post title</label>
        <input type="text" id="title" name="title" placeholder="title" required>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select class="catList" id="category" name="category" required>
            <option value="">Chose</option>
            <option value="technology">Technology</option>
            <option value="science">Science</option>
            <option value="sport">Sport</option>
            <option value="entertainment">Entertainment</option>
            <option value="music">Music</option>
            <option value="arts">Arts</option>
            <option value="fashion">Fashion</option>
            <option value="nature">Nature</option>
            <option value="bisnies">Bisnies</option>
            <option value="news">News</option>
            <option value="vihicle">Vihicle</option>
            <option value="spooky">Spoky</option>
            <option value="books">Books</option>
            <option value="movie">Movie</option>
            <option value="foodAndDrinks">Food and drinks</option>
            <option value="random">Random</option>
            <option value="other">other</option>
        </select>
    </div>
    <div class="form-group">
        <label for="body">Post body</label>
        <textarea id="body" name="body" placeholder="body" rows="6" required></textarea>
    </div>

    <div class="form-group">
        <button type="submit">Dodaj post</button>
    </div>
</form>

