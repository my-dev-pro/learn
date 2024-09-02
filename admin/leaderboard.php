<?php
    // check if vistor authorized
    session_start();

    // check if old session is still open
    if (!isset($_SESSION["userId"])) {
        header("Location: /mounira/quiz/auth/login.php");
        exit();
    }

// TODO: Fetch all quizees score to the admin page

?>


<!-- Use this if needed -->
<h2>Leaderboard</h2>
<table>
    <tr>
        <th>Username</th>
        <th>Quiz Title</th>
        <th>Score</th>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>

</table>