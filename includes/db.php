<?php
$host = 'localhost';
$dbname = 'ztraty_nalezy'; // Změň na název své databáze
$user = 'root'; // Uživatelské jméno pro přístup k databázi (ve výchozím stavu je to root)
$pass = 'root'; // Heslo (výchozí je prázdné)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Chyba připojení k databázi: ' . $e->getMessage();
}
?>