<?php
session_start();
include('function.php');

unset($_SESSION['is_login']);
redirect('login.php');
?>