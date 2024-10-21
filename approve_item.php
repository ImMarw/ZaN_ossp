<?php
session_start();
include 'includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!($_SESSION['role'] === 'admin')) {
        header('Location: index.php');
        exit();
    }
    $post_id = $_POST['post_id'];
    $stmt = $conn->prepare('UPDATE lost_items
    SET approved = 1
    WHERE id = ?;
    ');
    $stmt->execute([$post_id]);
    header('Location: approver.php');
    exit();
}