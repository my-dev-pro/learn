<?php
// check if vistor authorized
session_start();

// check if old session is still open
if (!isset($_SESSION["userId"])) {
    header("Location: /mounira/quiz/auth/login.php");
    exit();
}

$dbConnection = mysqli_connect("172.19.0.2", "root", "root", "quiz");
$query = "SELECT * FROM quizzes";
$request = mysqli_query($dbConnection, $query);

$response = mysqli_fetch_assoc($request);

mysqli_close($dbConnection);


?>

<!-- show list of available quizees with ability to take any quiz -->

<h2>Available Quizzes</h2>

<li>
    <a href="take_quiz.php?quiz_id=<?= $response['id'] ?>">Take a quiz</a>
    <p class="description"><?= $response['description'] ?></p>
</li>