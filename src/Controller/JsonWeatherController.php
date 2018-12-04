<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * A controller for flat file markdown content.
 */
class JsonWeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        //$page = $this->di->get("page");
        $keys = $this->di->get("keys");
        $adress = $this->di->get("request")->getGet("location");
        $boolean = 0;
        $res = "";
        $weatherResult = "";
        $result = "";
        $alldays = [];

        if ($adress != "") {
            if (filter_var($adress, FILTER_VALIDATE_IP)) {
                $res = "$adress är en giltig IP adress";
                $boolean = 1;
                $ipmodel = new IpModel();
                $tempip = $ipmodel->getIpData($adress);
                $result = json_decode($tempip);
                $weather = new WeatherModel();
                $weatherResult = $weather->getWeather($result->{'latitude'}, $result->{'longitude'}, $keys->getApiKey("darksky"));
            } else {
                $res = "$adress är inte en giltig IP adress";
                $boolean = 0;
            }
        }

        if ($boolean == 1) {
            for ($i=0; $i < 8; $i++) {
                $timestamp = $weatherResult->{'daily'}->{'data'}[$i]->{'time'};
                $jsoninfo = [
                    "day" . ($i + 1) => [
                        "date" => gmdate("Y-m-d", $timestamp),
                        "country" => $result->{'country_name'},
                        "region" => $result->{'region_name'},
                        "summary" => $weatherResult->{'daily'}->{'data'}[$i]->{'summary'},
                        "highesttemperature" => $weatherResult->{'daily'}->{'data'}[$i]->{'apparentTemperatureHigh'},
                        "lowesttemperature" => $weatherResult->{'daily'}->{'data'}[$i]->{'apparentTemperatureLow'}
                    ],
                ];
                array_push($alldays, $jsoninfo);
            }
        } else {
            $jsoninfo = [
                "ip" => $adress,
                "valid" => $res
            ];
            array_push($alldays, $jsoninfo);
        }


        return [$alldays];
    }
}
