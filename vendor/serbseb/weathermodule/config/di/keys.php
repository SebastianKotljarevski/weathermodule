<?php
/**
 * Configuration file to add as service in the Di container.
 */
return [

    // Services to add to the container.
    "services" => [
        "keys" => [
            "shared" => true,
            "callback" => function () {
                $key = new \Anax\Keys\Keys();
                return $key;
            }
        ],
    ],
];
