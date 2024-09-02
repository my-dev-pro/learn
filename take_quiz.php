<?php

// check if vistor authorized
session_start();

// check if old session is still open
if (!isset($_SESSION["userId"])) {
    header("Location: /mounira/quiz/auth/login.php");
    exit();
}

$quiz_id = $_GET['quiz_id'];

// create, read, update, delete
// 1- read => quiz details
// 2- update/create => 

// fetching question form DB
$dbConnection = mysqli_connect("172.19.0.2", "root", "root", "quiz");

$question_query = "SELECT * FROM questions WHERE quiz_id = {$quiz_id}";
$question_request = mysqli_query($dbConnection, $question_query);

$question = mysqli_fetch_assoc($question_request);

// fetching options form DB
$options_query = "SELECT * FROM options WHERE question_id = {$question['id']}";
$option_request = mysqli_query($dbConnection, $options_query);

$options = mysqli_fetch_all($option_request, MYSQLI_ASSOC);

mysqli_close($dbConnection);

// TODO: check the question answer if it's correct
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $answer = $_POST['answer'];

    $score = 0;

    foreach ($options as $item) {
        if ($answer == $item['id']) {
            if ($item['is_correct']) {
                echo '<h3 style="background-color: green;">Answer is Correct.</h3>';
            } else {
                echo '<h3 style="background-color: red;">Answer is wrong.</h3>';
            }
        }
    }

}


?>

<!-- TODO: create question form to score the student using mysqli to fetch the questions from DB -->


<!-- Use this if needed -->
<form method="POST">

    <h3><?= $question['question_text']; ?></h3>
    <?php
        foreach ($options as $index => $option) {
            // print_r($option);
            echo "<input type='radio' name='answer' value='{$option['id']}' />" . $option['option_text'];
        }
        
            
            
        
    ?>
    
    <button type="submit">Submit Quiz</button>
</form>