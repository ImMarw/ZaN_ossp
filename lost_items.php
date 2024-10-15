<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php include 'templates/header.php'; ?>
<?php
include 'includes/db.php'; // Připojení k databázi


try {
    $stmt = $conn->query("SELECT * FROM lost_items ORDER BY created_at DESC");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC); // Přidání FETCH_ASSOC pro získání asociativního pole

    if (empty($items)) {
        echo "<p class='text-center'>Žádné ztracené předměty nebyly nalezeny.</p>";
    } else {
        foreach ($items as $item) {
            echo "
            <div class='col-md-4 mb-4'>
                <div class='card'>
                    <img src='{$item['image_url']}' class='card-img-top' alt='{$item['name']}'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$item['name']}</h5>
                        <p class='card-text'>{$item['description']}</p>
                        <p class='card-text'><small class='text-muted'>Nalezeno: {$item['found_at']}</small></p>
                    </div>
                </div>
            </div>";
        }
    }
} catch (PDOException $e) {
    echo "Chyba při dotazu: " . $e->getMessage();
}
?>
<?php include 'templates/footer.php'; ?>