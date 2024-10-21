<?php
session_start();
if ($_SESSION['logged_in'] == null) {
    $_SESSION['logged_in'] = true;
    $_SESSION['role'] = 'user';
    $_SESSION['username'] = 'guest';
} else {
}
$approve_btn = '';
$user_icon = '';
if ($_SESSION['logged_in'] == true) {
    $user_icon = "
                <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    {$_SESSION['username']}
                </a>
                <ul class='dropdown-menu dropdown-menu-dark'>
                    <li><a class='dropdown-item'>Nejste přihlášen.</a></li>
                    <li><hr class='dropdown-divider'></li>
                    <li><a class='dropdown-item text-primary'href='login.php'>Přihlásit</a></li>
                </ul>
                </li>";
} else {
    $login_link = "
    <li class='nav-item'>
        <a class='nav-link' href='login.php'>Přihlášení</a>
    </li>
    <li class='nav-item'>
        <a class='nav-link' href='register.php'>Registrace</a>
    </li>";
}

if ($_SESSION['role'] === 'admin') {
    $approve_btn = '
        <li class="nav-item">
            <a class="nav-link" href="approver.php">Approver</a>
        </li>';
    $user_icon = "
                <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    {$_SESSION['username']}
                </a>
                <ul class='dropdown-menu dropdown-menu-dark'>
                    <li><a class='dropdown-item'>Správce</li>
                    <li><hr class='dropdown-divider'></li>
                    <li><a class='dropdown-item text-danger' href='logout.php'>Odhlásit</a></li>
                </ul>
                </li>";
} else {
    $login_link = "
    <li class='nav-item'>
        <a class='nav-link' href='login.php'>Přihlášení</a>
    </li>
    <li class='nav-item'>
        <a class='nav-link' href='register.php'>Registrace</a>
    </li>";
}

?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ztráty a Nálezy</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/img/osspZ&N2.png" alt="Logo" width="50" height="50" class="align-text-center m-2"> Ztráty a
                Nálezy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Domů</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lost_items.php">Ztracené předměty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">Přidat nález</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Přihlášení</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Registrace</a>
                    </li>
                    <?php echo $approve_btn; ?>
                    <?php echo $user_icon; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
</body>

</html>