<?php

use Negar\WeatherApp\WeatherService;

require_once __DIR__ . '/vendor/autoload.php';

$WeatherService = new WeatherService();

$city = "tehran";
$weather = $WeatherService->getWeather($city);

var_dump($weather);