<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
include 'includes/db.php'; // Připojení k databázi

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Získání dat z formuláře
    $name = $_POST['name'];
    $description = $_POST['description'];
    $found_at = $_POST['found_at'];

    // Zpracování obrázku
    $image = $_FILES['image'];
    $image_url = 'uploads/' . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $image_url);

    // Uložení do databáze
    $stmt = $conn->prepare("INSERT INTO lost_items (name, description, image_url, found_at, user_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $image_url, $found_at, 1]); // Zatím hardcodujeme user_id na 1

    header("Location: /lost_items.php"); // Přesměrování na lost_items.php
    exit;
}
?>