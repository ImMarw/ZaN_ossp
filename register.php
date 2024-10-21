<?php
include 'includes/db.php';

function checkEmailDomain($email)
{
    $emailParts = explode('@', $email);

    if (count($emailParts) !== 2) {
        return false;
    }

    $domain = $emailParts[1];

    if ($domain === 'student.ossp.cz') {
        return true;
    } elseif ($domain === 'ossp.cz') {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password_not_hashed = $_POST['password'];
    $password = password_hash($password_not_hashed, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $err = 1;
    if (checkEmailDomain($email) && $username && $password) {
        $err = 0;
    }
    if ($err == 0) {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, password_not_hashed) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $password, $password_not_hashed]);

        header('Location: login.php');
        exit();
    } else {
        $err = "<p class='alert alert-danger'>Neplatné email nebo heslo. Prosím, zkontrolujte email a heslo.</p>";
    }
}

include 'templates/header.php';
echo $err;
?>

<h2 class="mb-4">Registrace</h2>
<form action="register.php" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Uživatelské jméno</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Heslo</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrovat</button>
</form>

<?php include 'templates/footer.php'; ?>