<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * A controller for flat file markdown content.
 */
class IpController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction() : object
    {
        $page = $this->di->get("page");
        $res = "";
        $adress = $this->di->get("request")->getGet("ipadress");
        $boolean = 0;
        $result = "";
        $tempresult;
        $userip = $_SERVER["REMOTE_ADDR"] ?? '127.0.0.1';


        if ($adress != "") {
            if (filter_var($adress, FILTER_VALIDATE_IP)) {
                $res = "$adress är en giltig IP adress";
                $boolean = 1;
                $ipmodel = new IpModel();
                $tempresult = $ipmodel->getIpData($adress);
                $result = json_decode($tempresult);
            } else {
                $res = "$adress är inte en giltig IP adress";
                $boolean = 0;
            }
        }
        $page->add("anax/controller/index", [
            "res" => $res,
            "ipadress" => $adress,
            "boolean" => $boolean,
            "result" => $result,
            "userip" => $userip
        ]);

        return $page->render([
            "res" => $res,
            "ipadress" => $adress,
            "boolean" => $boolean,
            "result" => $result,
            "userip" => $userip
        ]);
    }
}
