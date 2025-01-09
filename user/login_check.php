<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['nome_utilizador'])) {
    header("Location: login.php");
    exit;
}
?>