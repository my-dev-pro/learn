<?php
    session_start();

    // check if old session is still open
    if (!isset($_SESSION['userId'])) {
        header("Location: /mounira/quiz/auth/login.php");
        exit;
    }






?>

<h1>Profile Page</h1>