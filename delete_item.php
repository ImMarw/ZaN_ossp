<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!($_SESSION['role'] === 'admin')) {
        header('Location: index.php');
        exit();
    }
    $post_id = $_POST['post_id'];
    $stmt = $conn->prepare("DELETE FROM lost_items WHERE id = ?");
    $stmt->execute([$post_id]);
    header('Location: lost_items.php');
    exit();
}
header('Location: lost_items.php');
exit();