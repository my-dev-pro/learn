<?php

session_start();

    // check if old session is still open
    if (! isset($_SESSION['userId'])) {
        header("Location: /mounira/quiz/auth/login.php");
        exit;
    }

?>

<div>
    <h3>Welcome to the admin dashboard</h3>
</div>

<div>
    <a href="create_quiz.php">Create new Quiz</a>
</div>

<div>
    <a href="logout.php">Logout</a>
</div>