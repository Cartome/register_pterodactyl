<?php
$apiUrl = 'http://nameofyoursite.com'; 
$apiKey = 'youkeyapi';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    if (empty($username) || empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        $error = 'Veuillez remplir tous les champs.';
    } else {
        $data = [
            'username' => $username,
            'email' => $email,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'password' => $password
        ];

        $ch = curl_init($apiUrl . '/api/application/users');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json',
            'Accept: Application/vnd.pterodactyl.v1+json'
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code === 201) {
            $success = '✅ Compte créé avec succès !';
        } else {
            $error = '❌ Erreur lors de la création : ' . $response;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - ShadowProps</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0d0d0d;
            font-family: 'Inter', sans-serif;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: #1a1a1a;
            padding: 40px;
            border: 1px solid #2c2c2c;
            border-radius: 10px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 0 15px rgba(0,0,0,0.6);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            color: #fff;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background: #2a2a2a;
            border: 1px solid #3a3a3a;
            color: #ffffff;
            border-radius: 6px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #ef4444;
            box-shadow: 0 0 5px #ef4444;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background: #dc2626;
        }

        .msg {
            margin-top: 15px;
            font-size: 14px;
            color: #f87171;
            text-align: center;
        }

        .success {
            color: #4ade80;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Créer un compte</h2>
        <?php if ($error): ?>
            <div class="msg"><?= $error ?></div>
        <?php elseif ($success): ?>
            <div class="msg success"><?= $success ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="text" name="first_name" placeholder="Prénom" required>
            <input type="text" name="last_name" placeholder="Nom" required>
            <input type="email" name="email" placeholder="Adresse e-mail" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>
