<?php require_once 'config.phpg';


require_once 'config.php'; 

class WeatherModel {
    public function getWeather($city) {
        $city = urlencode($city);
        $url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=" . API_KEY . "&units=metric";

        $response = @file_get_contents($url); 
        if ($response === FALSE) {
            return json_encode(['message' => 'Ville non trouvée']);
        }

        return $response;
    }
}
?>
