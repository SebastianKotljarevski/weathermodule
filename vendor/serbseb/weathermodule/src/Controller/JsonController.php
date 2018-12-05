<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * A controller for flat file markdown content.
 */
class JsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $res = "";
        $adress = $this->di->get("request")->getGet("ipadress");
        $jsoninfo = [];
        $result = "";
        $bool = 0;

        if ($adress != "") {
            if (filter_var($adress, FILTER_VALIDATE_IP)) {
                $res = "$adress är en giltig IP adress";
                $ipmodel = new IpModel();
                $tempresult = $ipmodel->getIpData($adress);
                $result = json_decode($tempresult);
                $bool = 1;
            } else {
                $res = "$adress är inte en giltig IP adress";
                $bool = 0;
            }
        }
        if ($bool == 1) {
            $jsoninfo = [
                "ip" => $adress,
                "valid" => $res,
                "typ" => $result->{'type'},
                "land" => $result->{'country_name'},
                "region" => $result->{'region_name'},
                "latitud" => $result->{'latitude'},
                "longitud" => $result->{'longitude'}
            ];
        } else {
            $jsoninfo = [
                "ip" => $adress,
                "valid" => $res
            ];
        }


        return [$jsoninfo];
    }
}
