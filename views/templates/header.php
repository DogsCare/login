<!doctype html>
<html lang="dk">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
    <ul>
        <li><a href="/Register">Registrer konto</a></li>
        <li><a href="/Login">Log ind</a></li>
        <li><a href="/Logout">Log ud</a></li>
        <li><a href="/Profil">Profil</a></li>
        <li><a href="/">Forsiden</a></li>
    </ul>
</div>
<div>
    <p>Session:</p>
    <?php echo (isset($_SESSION['auth'])) ? '<pre>' . print_r($_SESSION['auth'], true) . '</pre>' : ''; ?>
</div>

