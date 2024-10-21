<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'templates/header.php';
include 'includes/db.php';

try {
    $stmt = $conn->query("SELECT * FROM lost_items 
    WHERE approved = 1 
    ORDER BY found_at DESC;
    ");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($items)) {
        echo "<p class='text-center'>Žádné ztracené předměty nebyly nalezeny.</p>";
    } else {
        echo "<div class='row row-cols-1 row-cols-md-4 g-3'>";
        foreach ($items as $item) {
            $rem_button = "";
            if ($_SESSION['role'] === 'admin') {
                $rem_button = "
                <form action='delete_item.php' method='POST'>
                    <input type='hidden' name='post_id' value='{$item['id']}'>
                    <button type='submit' class='btn btn-danger btn-sm'>Smazat</button>
                </form>";
            }
            echo " 
                <div class='col'>
                    <div class='card h-100 border-black border-3'>
                        <img src='{$item['image_url']}' class='card-img-top' alt='{$item['name']}'
                             style='object-fit: cover; width: 100%; height: 250px;'>
                        <div class='card-body'>
                            <div style='display: flex; flex-direction: row; justify-content: space-between;'>
                            <h5 class='card-title'>{$item['name']}</h5>
                            {$rem_button}
                            </div>
                            <p class='card-text'>{$item['description']}</p>
                        </div>
                        <div class='card-footer'>
                            <small class='text-muted'>Nalezeno: {$item['found_at']}</small><br>
                            <small class='text-muted'>Nálezce: {$item['founder']}</small>
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