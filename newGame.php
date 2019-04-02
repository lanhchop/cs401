<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $host = $_POST["host"];
    $game = $_POST["game"];
    $location = $_POST["location"];
    $date = $_POST["date"];
    $players = $_POST["players"];

    $valid = true;

    if (empty($host) || strlen($host) < 1) {
        $hostError = "Please enter the name of the host";
        $valid = false;
    }
    if (empty($game) || strlen($game) < 1) {
        $gameError = "Please enter a game";
        $valid = false;
    }
    if (empty($location) || strlen($location) < 1) {
        $locationError = "Please enter a valid location";
        $valid = false;
    }
    if (empty($date)) {
        $match = preg_match("/^\d\d\/\d\d\/\d\d\d\d$/", $date);
        if (empty($match)) {
            $dateError = "Please enter a date in the following format: MM/DD/YYYY";
        } else {
            $dateError = "Date field cannot be empty";
        }
        $valid = false;
    }
    if (empty($players) || !is_numeric($players) || ($players < 1)) {
        $playerError = "Please enter a valid number of players";
        $valid = false;
    }

    if ($valid) {
        echo "A new game has been created!";
        header("Location: index.php");
    }
}

// $query = sprintf("",
//             mysqli_real_escape_string($_POST["host"]),
//             mysqli_real_escape_string($_POST["game"]),
//             mysqli_real_escape_string($_POST["location"]),
//             mysqli_real_escape_string($_POST["date"]),
//             mysqli_real_escape_string($_POST["players"]));

// TODO insert stuff into a user table in the database..
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
        <a href="index.php" class="title"><img src="logo.png" class="logo"/>Meeple Like Us</a>
    </div>
</header>

<body class="body">
    <div class="card">
        <div class="loginCard">
            Create New Game
        </div>
        <form method="POST" action="newGame.php">
            <label>
                Host
                <?php
                echo "<input name=\"host\" class=\"input\" value=\"{$host}\">";
                echo "<div>{$hostError}</div>";
                ?>
            </label>

            <label>
                Game
                <?php
                echo "<input name=\"game\" class=\"input\" value=\"{$game}\">";
                echo "<div>{$gameError}</div>";
                ?>
            </label>
            <label>
                Location
                <?php
                echo "<input name=\"location\" class=\"input\" value=\"{$location}\">";
                echo "<div>{$locationError}</div>";
                ?>
            </label>
            <label>
                Date
                <?php
                echo "<input name=\"date\" class=\"input\" type=\"date\" placeholder=\"mm/dd/yyyy\" value=\"{$date}\">";
                echo "<div>{$dateError}</div>";
                ?>
            </label>
            <label>
                Number of Players
                <?php
                echo "<input name=\"players\" class=\"input\" id=\"movie\" type=\"number\" value=\"{$players}\" min=\"2\">";
                echo "<div>{$playerError}</div>";
                ?>
            </label>
            <button class="register">
                <a href="index.php">nevermind</a>
            </button>
            <button class="loginButton">
                okay
            </button>
        </form>
    </div>
</body>

</html>
