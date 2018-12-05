<?php

namespace Anax\Controller;

class WeatherModel
{
    public function getWeather($latitude, $longitude, $apikey)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.darksky.net/forecast/' . $apikey . '/' . $latitude . ',' . $longitude . '?exclude=currently,minutely,hourly,alerts,flags'
        ));

        $res = curl_exec($curl);
        curl_close($curl);

        return json_decode($res);
    }
}
