<?php
$host = 'localhost';
$dbname = 'ztraty_nalezy';
$user = 'root';
$pass = 'root';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Chyba připojení k databázi: ' . $e->getMessage();
}