<?php require_once __DIR__ . "models/weatherModel.php";

class WeatherController {
    public function index() {
        $city = isset($_GET['city']) ? $_GET['city'] : null;

        if ($city) {
            $model = new WeatherModel();
            $weatherData = $model->getWeather($city);
            $data = json_decode($weatherData, true);
        } else {
            $data = null; 
        }

        return $data;
    }
}
?>
