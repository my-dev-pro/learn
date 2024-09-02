<?php
    // check if vistor authorized
    session_start();

    // check if old session is still open
    if (!isset($_SESSION["userId"])) {
        header("Location: /mounira/quiz/auth/login.php");
        exit();
    }

// TODO: Fetch all quizees score to the admin page

$dbConnection = mysqli_connect("172.19.0.2", "root", "root", "quiz");
$quizzes_query = "SELECT u.username, q.title, uq.score 
                        FROM user_quizzes uq 
                        JOIN users u ON uq.user_id = u.id 
                        JOIN quizzes q ON uq.quiz_id = q.id 
                        ORDER BY uq.score DESC LIMIT 10";
$quizzes_request = mysqli_query($dbConnection, $quizzes_query);
$quizzes_score = mysqli_fetch_all($quizzes_request, MYSQLI_ASSOC);

mysqli_close($dbConnection);

?>


<!-- Use this if needed -->
<h2>Leaderboard</h2>
<table border="1">
    <tr>
        <th>Username</th>
        <th>Quiz Title</th>
        <th>Score</th>
    </tr>
   
    <?php
        foreach ($quizzes_score as $quiz) { ?>
            <tr>
                <td><?= $quiz['username']; ?></td>
                <td><?= $quiz['title']; ?></td>
                <td><?= $quiz['score']; ?></td>
            </tr>
        <?php }
    ?>

</table>