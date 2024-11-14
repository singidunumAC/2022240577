<?php
require '../core/connect.php';
session_start();
if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    echo 'ID korisnika: ' . $userId;
} else {
    echo 'Korisnik nije prijavljen.';
}
?>
<head>
    <title></title>
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/css/colors.css">
</head>
<body>
<div class="grid-container">

    <!-- Header -->
    <header class="header-class">
        <?php require '../template/header.php'; ?>
    </header>

    <!-- Side Panel -->
    <aside class="side-panel">
        <?php require '../template/sidePanel.php'; ?>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Forma sa dugmetom za prikaz korisnika -->
        <form method="POST" action="">
            <button type="submit" name="show_users">Prikaži korisnike</button>
        </form>
        <div id="data-output">
            <?php
            if (isset($_POST['show_users'])) {
                try {
                    // Upit za dohvatanje podataka
                    $sql = "SELECT * FROM users";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (!empty($users)) {
                        foreach ($users as $user) {
                            echo "<p>ID: " . htmlspecialchars($user['id']) .
                                ", Ime: " . htmlspecialchars($user['name']) .
                                ", pass: " . htmlspecialchars($user['password']) . "</p>";
                        }
                    } else {
                        echo "<p>Nema korisnika u bazi.</p>";
                    }
                } catch (PDOException $e) {
                    echo "<p>Greška prilikom dohvatanja podataka: " . htmlspecialchars($e->getMessage()) . "</p>";
                }
            }
            ?>
        </div>

    </main>


    <!-- Footer -->
    <footer class="footer-class">
        <?php require '../template/footer.php'; ?>
    </footer>

</div>
</body>