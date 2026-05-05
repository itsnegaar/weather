<?php

use Negar\WeatherApp\WeatherService;

require_once __DIR__ . '/vendor/autoload.php';

if ($argc !=2) {
    echo "Usage: php weather.php <city> <temp>\n";
    exit(1);
}
$WeatherService = new WeatherService();

$city = $argv["1"];
echo "Getting information for the weather in $city\n";
$weather = $WeatherService->getWeather($city);


echo "\n";
echo "City: " . $weather["city"] . "\n";
echo "Description: " . $weather["description"] . "\n";
echo "Temperature: " . $weather["temp"] . "\n";
echo "Humidity: " . $weather["humidity"] . "\n";