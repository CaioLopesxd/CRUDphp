<?php

session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
unset($_SESSION['id']);
header("Location: login.php");
