<?php
    session_start();

    // check if old session is still open
    if (!empty($_SESSION['userId'])) {
        header("Location: /mounira/quiz/auth/profile.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $dbConnection = new mysqli('172.18.0.3', 'root', 'root', 'quiz');

        $query = $dbConnection->prepare("SELECT `id`, `password` FROM users WHERE email = ?");
        $query->bind_param('s', $email);

        $query->execute();
        $query->bind_result($id, $hashed_password);
        $query->fetch();

        if ($id && password_verify($password, $hashed_password) ) {
            $_SESSION['userId'] = $id;
            header("Location: /mounira/quiz/auth/profile.php");
        }

        $query->close();
        $dbConnection->close();

    }

?>

<h1>Login page</h1>

<div>
    <form method="post">
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Login</button>
    </form>
</div>


<div>
    <span>If new user please register form </span>
    <a href="register.php">Register page</a>
</div>