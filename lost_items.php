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
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($items)) {
        echo "<p class='text-center'>Žádné ztracené předměty nebyly nalezeny.</p>";
    } else {
        echo "<div class='row row-cols-1 row-cols-md-4 g-3'>"; // g-3 přidává mezeru
        foreach ($items as $item) {
            echo " 
                <div class='col'>
                    <div class='card h-100'>
                        <img src='{$item['image_url']}' class='card-img-top' alt='{$item['name']}'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$item['name']}</h5>
                            <p class='card-text'>{$item['description']}</p>
                        </div>
                        <div class='card-footer'>
                            <small class='text-muted'>Nalezeno: {$item['found_at']}</small>
                        </div>
                    </div>
                </div>";
        }
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "Chyba při dotazu: " . $e->getMessage();
}
?>

<?php include 'templates/footer.php'; ?>
<!-- 
<div class='card mb-4' style='max-width: 200px;'>
                    <div class='card'>
                        <img src='{$item['image_url']}' class='card-img-top' alt='{$item['name']}'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$item['name']}</h5>
                            <p class='card-text'>{$item['description']}</p>
                            <p class='card-text'><small class='text-muted'>Nalezeno: {$item['found_at']}</small></p>
                        </div>
                    </div>
                </div>div>
            </div>";-->