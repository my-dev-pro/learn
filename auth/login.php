<?php
session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $dbConnection = new mysqli('172.18.0.3', 'root', 'root', 'quiz');
        $query = $dbConnection->prepare("SELECT `id`, `password` FROM users WHERE email = ?");
        $query->bind_param('s', $email);

        $query->execute();
        // $query->bind_result($id, $hashed_password);
        // $query->fetch();
        $response = $query->get_result();
        $response->fetch_array(MYSQLI_NUM);

        echo '<pre>';
        var_dump($query->get_result());
        var_dump($response);
        echo '</pre>';

        if ($query->num_rows > 0 && password_verify($password, $hashed_password) ) {
            $_SESSION['userId'] = $id;
            echo 'Login Successfully!';
        }

        $query->close();
        $dbConnection->close();

        print_r($_SESSION['userId']);

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