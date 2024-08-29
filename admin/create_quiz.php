<?php

session_start();

    // check if old session is still open
    if (! isset($_SESSION['userId'])) {
        header("Location: /mounira/quiz/auth/login.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];

        // connect database
        $dbConnection = mysqli_connect("172.18.0.2", "root", "root", "quiz");

        $query = "INSERT INTO quizzes (`title`, `description`) VALUES ('{$title}', '{$description}')";

        $request = mysqli_query($dbConnection, $query);
   
        /* Close the connection as soon as it's no longer needed */
        mysqli_close($dbConnection);
        
        echo $request ? 'Quiz created successfully.' : 'Error: ' . $dbConnection->error;

    }

    // condistion ? show value : show another value

    // $username = 'mounira';

    // echo $username ? $username : 'user Not found';

    // nullablity checking
    // echo $username ?? 'user Not found';

?>

<h1>Create New Quiz</h1>

<div>
    <form method="POST">
        <input type="title" name="title" placeholder="Title" required />
        <input type="text" name="description" placeholder="Description" required />
        <button type="submit">Create Quiz</button>
    </form>
</div>