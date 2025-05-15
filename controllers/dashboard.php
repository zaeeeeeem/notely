<?php
session_start();
require '../config/db.php';
require '../models/User.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
}

$userModel = new User($pdo);
$user = $userModel->getUser($_SESSION['user_id']);
?>