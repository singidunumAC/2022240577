
<?php
require '../core/connect.php';
session_start();

// Grafikon: Broj postova po kategoriji
$stmt = $pdo->query("SELECT category, COUNT(*) AS count FROM post GROUP BY category");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$categories = [];
$counts = [];
foreach ($data as $row) {
    $categories[] = $row['category'];
    $counts[] = $row['count'];
}
$categoriesJson = json_encode($categories);
$countsJson = json_encode($counts);

// Grafikon: Aktivnost po satima
$stmtActivity = $pdo->query("SELECT HOUR(created_at) AS hour, COUNT(*) AS count FROM comments GROUP BY HOUR(created_at)");
$activityData = $stmtActivity->fetchAll(PDO::FETCH_ASSOC);
$hours = [];
$activityCounts = [];
foreach ($activityData as $row) {
    $hours[] = $row['hour'] . ':00';
    $activityCounts[] = $row['count'];
}
$hoursJson = json_encode($hours);
$activityCountsJson = json_encode($activityCounts);

// Grafikon: Broj komentara po objavi
$stmtComments = $pdo->query("SELECT post_id, COUNT(*) AS count FROM comments GROUP BY post_id");
$commentsData = $stmtComments->fetchAll(PDO::FETCH_ASSOC);
$postIds = [];
$commentCounts = [];
foreach ($commentsData as $row) {
    $postIds[] = 'Post ' . $row['post_id'];
    $commentCounts[] = $row['count'];
}
$postIdsJson = json_encode($postIds);
$commentCountsJson = json_encode($commentCounts);

$stmtTopCategories = $pdo->query("SELECT category, COUNT(*) AS count FROM post GROUP BY category ORDER BY count DESC LIMIT 5");
$topCategoriesData = $stmtTopCategories->fetchAll(PDO::FETCH_ASSOC);

$topCategories = [];
$topCategoryCounts = [];
foreach ($topCategoriesData as $row) {
    $topCategories[] = $row['category'];
    $topCategoryCounts[] = $row['count'];
}

$topCategoriesJson = json_encode($topCategories);
$topCategoryCountsJson = json_encode($topCategoryCounts);

// Dohvatanje podataka o up i down voteovima po postu
$stmtVotes = $pdo->query("
    SELECT id, SUM(upVote) AS upVote, SUM(downVote) AS downVote 
    FROM post 
    GROUP BY id
");
$votesData = $stmtVotes->fetchAll(PDO::FETCH_ASSOC);

$postIds = [];
$upVotes = [];
$downVotes = [];
foreach ($votesData as $row) {
    $postIds[] = 'Post ' . $row['id'];
    $upVotes[] = $row['upVote'];
    $downVotes[] = $row['downVote'];
}

$postIdJson = json_encode($postIds);
$upVotesJson = json_encode($upVotes);
$downVotesJson = json_encode($downVotes);
?>
<h3>Statistika sajta</h3>
<canvas id="myChart" width="800" height="400"></canvas>
<h3>Aktivnost u odnosu na vreme</h3>
<canvas id="activityChart" width="800" height="400"></canvas>
<h3>Broj komentara po objavi</h3>
<canvas id="commentsChart" width="800" height="400"></canvas>
<h3>Najpopularnije kategorije</h3>
<canvas id="topCategoriesChart" width="800" height="400"></canvas>
<h3>Odnos upvote i downvote </h3>
<canvas id="votesChart" width="800" height="400"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Prvi grafikon: Broj postova po kategoriji
    const categories = <?php echo $categoriesJson; ?>;
    const counts = <?php echo $countsJson; ?>;
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: categories,
            datasets: [{
                label: 'Broj postova po kategoriji',
                data: counts,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {beginAtZero: true}
            }
        }
    });

    // Drugi grafikon: Aktivnost po satima
    const hours = <?php echo $hoursJson; ?>;
    const activityCounts = <?php echo $activityCountsJson; ?>;
    const ctxActivity = document.getElementById('activityChart').getContext('2d');
    const activityChart = new Chart(ctxActivity, {
        type: 'line',
        data: {
            labels: hours,
            datasets: [{
                label: 'Aktivnost po satima',
                data: activityCounts,
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {beginAtZero: true}
            }
        }
    });


    // Treći grafikon: Broj komentara po objavi
    const postIds = <?php echo $postIdsJson; ?>;
    const commentCounts = <?php echo $commentCountsJson; ?>;
    const ctxComments = document.getElementById('commentsChart').getContext('2d');
    const commentsChart = new Chart(ctxComments, {
        type: 'bar',
        data: {
            labels: postIds,
            datasets: [{
                label: 'Broj komentara po objavi',
                data: commentCounts,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {beginAtZero: true}
            }
        }
    });


    const topCategories = <?php echo $topCategoriesJson; ?>;
    const topCategoryCounts = <?php echo $topCategoryCountsJson; ?>;

    const ctxTopCategories = document.getElementById('topCategoriesChart').getContext('2d');
    const topCategoriesChart = new Chart(ctxTopCategories, {
        type: 'bar',
        data: {
            labels: topCategories,
            datasets: [{
                label: 'Broj objava',
                data: topCategoryCounts,
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y', // Ovo omogućava horizontalni prikaz
            scales: {
                x: {beginAtZero: true}
            }
        }
    });


    // Dobijanje podataka iz PHP-a
    const postId = <?php echo $postIdsJson; ?>;
    const upVotes = <?php echo $upVotesJson; ?>;
    const downVotes = <?php echo $downVotesJson; ?>;

    // Kreiranje grafikona
    const ctxVotes = document.getElementById('votesChart').getContext('2d');
    const votesChart = new Chart(ctxVotes, {
        type: 'bar',
        data: {
            labels: postId,
            datasets: [
                {
                    label: 'Upvotes',
                    data: upVotes,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Downvotes',
                    data: downVotes,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {title: {display: true, text: 'Post ID'}},
                y: {beginAtZero: true, title: {display: true, text: 'Broj glasova'}}
            }
        }
    });

</script>
