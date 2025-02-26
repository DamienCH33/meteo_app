<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Météo</title>
    <link rel="stylesheet" href="app/views/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="app/views/ressources/logo.jpg" alt="Logo Météo">
        </div>
        <button class="menu-toggle">☰</button>
        <div class="navbar-menu">
            <a href="#">Accueil</a>
            <a href="#">Météo marine</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
        </div>
        <div class="search-container">
            <input type="text" placeholder="Rechercher une ville, un pays ..." class="search-bar">
            <button type="submit" class="search-button">🔍</button>
        </div>
    </nav>
    <script src="/app/views/script.js"></script>
</body>
</html>
