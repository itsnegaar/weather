<?php

namespace Negar\WeatherApp;

use GuzzleHttp\Client;

class WeatherService
{
    private Client $client;
    public function __construct(
        private readonly string $apiKey = "3f3e9687740cbb213902f6828778f858",
        private readonly string $apiUrl = "http://api.openweathermap.org/data/2.5/weather")
    {
        $this->client = new Client();
    }

    public function getWeather(string $city): array
    {
        $response = $this->client->get($this->apiUrl, [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric',
            ]
        ]);
        $weather_data =  json_decode($response->getBody()->getContents(), true);
        return [
            'city' => $weather_data['name'],
            'temp' => $weather_data['main']['temp'],
            'humidity' => $weather_data['main']['humidity'],
            'description' => $weather_data['weather'][0]['description'],
        ];


    }
}