<?php include_once 'header.php'?>

<?require_once 'WeatherController.php';

$controller = new WeatherController();
$data = $controller->index();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte Météo</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="/views/style.css"/>
    <style>
        #map { height: 400px; }
    </style>
</head>

<body>
    <h1>Carte Météo</h1>
    <div id="search-container">
        <form action="" method="get">
            <input type="text" name="city" id="city-input" placeholder="Entrez une ville" required />
            <button type="submit">Rechercher</button>
        </form>
    </div>
    <div id="map"></div>

    <script>
        var map = L.map('map').setView([46.6034, 1.8883], 6);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        L.marker([48.8534, 2.3488]).addTo(map)
            .bindPopup('Météo à Paris')
            .openPopup();

        <?php if (isset($data) && isset($data['coord'])): ?>
            var lat = <?= $data['coord']['lat'] ?>; // Latitude de la ville
            var lon = <?= $data['coord']['lon'] ?>; // Longitude de la ville
            var temperature = <?= $data['main']['temp'] ?>; // Température
            var weatherDescription = "<?= $data['weather'][0]['description'] ?>"; // Description de la météo
            var city = "<?= htmlspecialchars($_GET['city']) ?>"; // Nom de la ville

            map.setView([lat, lon], 10); // Centrer la carte sur la ville
            L.marker([lat, lon]).addTo(map)
                .bindPopup(`Météo à ${city}: ${temperature} °C, ${weatherDescription}`)
                .openPopup(); // Afficher un popup avec les infos
        <?php else: ?>
            console.log("Aucune donnée météo disponible.");
        <?php endif; ?>
    </script>


    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="/app/views/script.js"></script>



</body>

<?php include_once 'footer.php';?>
</html>