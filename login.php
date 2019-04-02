<?php
session_start();
$_SESSION['username'] = $_POST["username"];

// $query = sprintf("",
//     mysqli_real_escape_string($_POST["username"]),
//     mysqli_real_escape_string($_POST["password"]));

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $valid = true;
    if (empty($username) || strlen($username) < 1) {
        $usernameError = "Please enter a username";
        $valid = false;
    }
    if (empty($password) || strlen($password) < 5) {
        $passwordError = "The password is incorrect. Please try again.";
        $valid = false;
    }

    if ($valid) {
        echo "Login successful";
        header("Location: index.php");
    }

}

?>

<html>

<head>
    <link href="index.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hanalei Fill">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="shortcut icon" src="favicon.ico" />
</head>

<header>
    <title>Meeple Like Us</title>
    <div class="navbar">
        <a href="index.php" class="title"><img src="logo.png" class="logo">Meeple Like Us</a>
    </div>
</header>

<body class="body">
    <div class="card">
        <div class="loginCard">
            Sign In
        </div>
        <form method="POST" action="login.php">
            <label>
                Username
                <?php
                    echo "<input name=\"username\" class=\"input\" value=\"{$username}\">";
                    echo "<div>{$usernameError}</div>";
                ?>
            </label>
            <label>
                Password
                <?php
                    echo "<input name=\"password\" class=\"input\">";
                    echo "<div>{$passwordError}</div>";
                ?>
            </label>
            <button class="register">
                <a href="register.php">
                    register
                </a>
            </button>
            <button type="submit" class="loginButton">
                okay
            </button>
        </form>
    </div>
</body>

</html>