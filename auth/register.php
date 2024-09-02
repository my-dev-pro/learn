<?php

// check if old session is still open
if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
}

// database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // database connection start

    $dbConnection = new mysqli("172.19.0.2", "root", "root", "quiz");
    $query = $dbConnection->prepare(
        "INSERT INTO users (`username`,`email`,`password`) VALUES (?, ?, ?)"
    );
    $query->bind_param("sss", $username, $email, $password);

    if (!$query->execute()) {
        echo "Worng data.";
        $query->close();
        $dbConnection->close();
    }

    echo "Registration Successful.";
    $query->close();
    $dbConnection->close();
}

// check registration status

// echo '<pre>';
// print_r();
// echo '</pre>';
?>

<h1>Register page</h1>

<div>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Register</button>
    </form>
</div>

<div>
    <a href="login.php">Login page</a>
</div>
