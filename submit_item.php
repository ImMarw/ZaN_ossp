<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $found_at = $_POST['found_at'];

    $image = $_FILES['image'];
    $image_url = 'uploads/' . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $image_url);

    $stmt = $conn->prepare("INSERT INTO lost_items (name, description, image_url, found_at, founder) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $image_url, $found_at, $_SESSION['username']]);

    header("Location: /lost_items.php");
    exit;
}