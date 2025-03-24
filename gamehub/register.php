<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="games.php">Games</a></li>
            <li><a href="register.php">Lid worden</a></li>
            <li><a href="news.php">Nieuws</a></li>
        </ul>
    </nav>
</header>     

<?php 

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $favorite_game = $_POST['favorite_game'];

    if (strlen($username) < 3 || strlen($username) > 15) {
        $errors[] = "Gebruikersnaam moet tussen 3 en 15 tekens zijn.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Ongeldig e-mailadres.";
    }
    if (empty($favorite_game)) {
        $errors[] = "Selecteer een favoriete game.";
    }
    if (empty($errors)) {
        echo "<p>Succesvol geregistreerd!</p>";
    }
}
?>
<main>
    <h1>Word lid van GameHub</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Gebruikersnaam" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <select name="favorite_game">
            <option value="">Kies je favoriete game</option>
            <option value="The Witcher 3">The Witcher 3</option>
            <option value="Cyberpunk 2077">Cyberpunk 2077</option>
            <option value="GTA V">GTA V</option>
            <option value="Minecraft">Minecraft</option>
        </select>
        <button type="submit">Registreer</button>
    </form>
    <?php if (!empty($errors)) { echo '<p>' . implode('<br>', $errors) . '</p>'; } ?>
</main>


</body>
</html>






