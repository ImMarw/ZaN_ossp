<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php include 'templates/header.php'; ?>
<?php
if (!($_SESSION['role'] == 'admin')) {
    header('Location: index.php');
    exit();
} else {

    include 'includes/db.php';

    try {
        $stmt = $conn->query("SELECT * FROM lost_items 
    WHERE approved = 0
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
                <div style='display: flex; flex-direction: row; gap: 0.5rem;'>
                    <form action='delete_item.php' method='POST'>
                        <input type='hidden' name='post_id' value='{$item['id']}'>
                        <button type='submit' class='btn btn-danger btn-sm'>Smazat</button>
                    </form>
                    <form action='approve_item.php' method='POST'>
                        <input type='hidden' name='post_id' value='{$item['id']}'>
                        <button type='submit' class='btn btn-success btn-sm'>Schválit</button>
                    </form>
                </div>";
                }
                echo " 
                <div class='col'>
                    <div class='card h-100'>
                        <img src='{$item['image_url']}' class='card-img-top' alt='{$item['name']}'>
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
}
?>

<?php include 'templates/footer.php'; ?>