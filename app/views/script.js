document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.querySelector(".menu-toggle");
    const navbarMenu = document.querySelector(".navbar-menu");

    menuToggle.addEventListener("click", function () {
        navbarMenu.classList.toggle("active");
    });

    document.addEventListener("click", function (event) {
        if (!navbarMenu.contains(event.target) && !menuToggle.contains(event.target)) {
            navbarMenu.classList.remove("active");
        }
    });
});


/* SCRIPT MAP ACCUEIL */
var map = L.map('map').setView([46.6034, 1.8883], 6); // Centre sur la France

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Remplacez 'YOUR_API_KEY' par votre clé API OpenWeatherMap
        const apiKey = 'YOUR_API_KEY';

        // Fonction pour obtenir la météo et centrer la carte
        function getWeather(city) {
            const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Ville non trouvée');
                    }
                    return response.json();
                })
                .then(data => {
                    // Récupérer les coordonnées et la température
                    const lat = data.coord.lat;
                    const lon = data.coord.lon;
                    const temperature = data.main.temp;

                    // Centrer la carte sur la ville recherchée
                    map.setView([lat, lon], 10);

                    // Ajouter un marqueur avec les données météo
                    L.marker([lat, lon]).addTo(map)
                        .bindPopup(`Météo à ${city}: ${temperature} °C`)
                        .openPopup();
                })
                .catch(error => {
                    alert(error.message); // Afficher un message d'erreur
                });
        }

        // Gestionnaire d'événement pour le bouton de recherche
        document.getElementById('search-button').addEventListener('click', () => {
            const city = document.getElementById('city-input').value;
            if (city) {
                getWeather(city);
            } else {
                alert('Veuillez entrer une ville.');
            }
        });

        // Gestionnaire d'événement pour la touche "Entrée"
        document.getElementById('city-input').addEventListener('keypress', (event) => {
            if (event.key === 'Enter') {
                const city = document.getElementById('city-input').value;
                if (city) {
                    getWeather(city);
                } else {
                    alert('Veuillez entrer une ville.');
                }
            }
        });

        var map = L.map('map').setView([46.6034, 1.8883], 6); // Position par défaut sur la France

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);