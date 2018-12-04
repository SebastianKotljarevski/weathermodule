<?php

namespace Anax\Controller;

class IpModel
{
    public function getIpData($ipAdress)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://api.ipstack.com/' . $ipAdress . '?access_key=24f9b4146955395ba4c6c0424c4ec8d5'
        ));

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }
}
