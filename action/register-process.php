<?php
session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    header('Location: ../register.php?error=password_mismatch');
    exit();
}

$_SESSION['user'] = ['username' => $username];
header('Location: ../profile.php');
exit();