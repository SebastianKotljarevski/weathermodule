<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * A controller for flat file markdown content.
 */
class WeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction() : object
    {
        $page = $this->di->get("page");
        $keys = $this->di->get("keys");
        $adress = $this->di->get("request")->getGet("location");
        $boolean = 0;
        $res = "";
        $weatherResult = "";
        $result = "";

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

        $page->add("anax/controllerWeather/index", [
            "res" => $res,
            "weatherForecast" => $weatherResult,
            "location" => $result,
            "bool" => $boolean
        ]);

        return $page->render([
            "res" => $res,
            "weatherForecast" => $weatherResult,
            "location" => $result,
            "bool" => $boolean
        ]);
    }
}
