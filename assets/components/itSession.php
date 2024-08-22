<?php
session_start();

$inactive = 500; // Set inactivity period (in seconds)
if (!isset($_SESSION['timeout'])) {
    $_SESSION['timeout'] = time() + $inactive;
}

$session_life = time() - $_SESSION['timeout'];

if ($session_life > $inactive) {
    session_destroy();
    header("Location: ../index.php");
    exit();
}

$_SESSION['timeout'] = time();

// Check if user is logged in and has the role of "IT"
if (!isset($_SESSION["id"]) || $_SESSION["role"] !== "IT") {
    unset($_SESSION["username"]);
    session_destroy();
    header("location: ../index.php");
    exit();
}

