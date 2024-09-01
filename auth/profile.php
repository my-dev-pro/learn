<?php
    session_start();

    // TODO: check if old session is still open
    if (! isset($_SESSION['userId'])) {
        header("Location: /mounira/quiz/auth/login.php");
        exit;
    }




?>

<h1>Profile Page</h1>

<div>
    <a href="logout.php">Logout</a>
</div>

<!-- TODO: fetch this data from DB -->

<p>Username: </p>
<p>Email: </p>

<h3>Your Quiz Results</h3>
<ul>
    <li>title: score</li>
</ul>
