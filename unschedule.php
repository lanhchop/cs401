<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit;
    }

    $user_id = $_SESSION['userId'];
    $event_id = $_GET['event_id'];

    require_once 'Dao/scheduleDao.php';
    $scheduleDao = new scheduleDao();
    $scheduleDao->leaveGame($user_id, $event_id);

}

header("Location: index.php");
?>