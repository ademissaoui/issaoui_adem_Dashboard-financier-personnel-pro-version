<?php
session_start();
// Si l'utilisateur est déjà connecté, rediriger vers le dashboard selon le rôle
if (!empty($_SESSION['user_id'])) {
    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
    if (!empty($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        header("Location: {$base}/dashboard/index.html");
        exit;
    } else {
        header("Location: {$base}/dashboard/index.html");
        exit;
    }
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0
        }

        form {
            width: 320px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0
        }

        button {
            width: 100%;
            padding: 10px
        }

        .error {
            color: #b00
        }
    </style>
</head>

<body>
    <form method="post" action="auth.php">
        <h2>Connexion</h2>
        <?php if (!empty($_GET['error'])): ?>
            <div class="error">Identifiants invalides</div>
        <?php endif; ?>
        <label>Utilisateur<br><input name="username" required></label>
        <label>Mot de passe<br><input type="password" name="password" required></label>
        <button type="submit">Se connecter</button>
    </form>
</body>

</html>