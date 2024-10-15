<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $password]);

    header('Location: login.php');
    exit();
}

include 'templates/header.php';
?>

<h2 class="mb-4">Registrace</h2>
<form action="register.php" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Uživatelské jméno</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Heslo</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrovat</button>
</form>

<?php include 'templates/footer.php'; ?>